<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PenerimaBahanController extends Controller
{
    public function storePenerimaBahan(Request $request)
    {
        try {
            // Validasi lengkap semua field yang diperlukan
            $validated = $request->validate([
                'data' => 'required|array|min:1',
                'data.*.nomor_dapur' => 'required|string|max:50',
                'data.*.nama_bahan' => 'required|string|max:100',
                'data.*.jumlah' => 'required|string|max:20',
            ]);

            // Pastikan ada data yang akan diproses
            if (empty($validated['data'])) {
                throw new \Exception('Data array tidak boleh kosong');
            }

            // Ambil semua nomor dapur unik dari request
            $nomorDapurUnik = collect($validated['data'])
                ->pluck('nomor_dapur')
                ->unique()
                ->values()
                ->all();

            // Mulai transaction
            DB::beginTransaction();

            // Hapus data dengan nomor dapur yang sama
            DB::table('tb_penerima_bahan')
                ->whereIn('nomor_dapur', $nomorDapurUnik)
                ->delete();

            // Siapkan data untuk insert
            $dataToInsert = collect($validated['data'])->map(function ($item) {
                return [
                    'nomor_dapur' => $item['nomor_dapur'],
                    'nama_bahan' => $item['nama_bahan'],
                    'jumlah' => $item['jumlah'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray();

            // Insert data baru
            DB::table('tb_penerima_bahan')->insert($dataToInsert);

            // Commit transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data penerimaan bahan berhasil disimpan!',
                'data' => $dataToInsert,
                'deleted_records' => count($nomorDapurUnik)
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in storePenerimaBahan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server: ' . $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        try {
            $penerimaanBahan = DB::table('tb_penerima_bahan')
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $penerimaanBahan
            ]);

        } catch (\Exception $e) {
            Log::error('Error in index: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data penerimaan bahan'
            ], 500);
        }
    }
}