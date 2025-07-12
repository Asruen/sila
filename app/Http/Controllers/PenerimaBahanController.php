<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan ini!

class PenerimaBahanController extends Controller
{
    public function storePenerimaBahan(Request $request)
    {
        // Validasi langsung menggunakan Request tanpa perlu import Validator
        $request->validate([
            'data' => 'required|array',
            'data.*.nomor_dapur' => 'required|string',
            'data.*.tanggal' => 'required|date',
            'data.*.nama_bahan' => 'required|string',
            'data.*.jumlah_datang' => 'required|string',
            'data.*.tanggal_jam' => 'required|date',
            'data.*.jumlah' => 'required|string',
            'data.*.nama_supplier' => 'required|string',
        ]);

        // Proses penyimpanan data
        $data = collect($request->data)->map(function ($item) {
            return [
                'nomor_dapur' => $item['nomor_dapur'],
                'tanggal' => $item['tanggal'],
                'nama_bahan' => $item['nama_bahan'],
                'jumlah' => $item['jumlah'],
                'jumlah_datang' => $item['jumlah_datang'],
                'tanggal_jam' => $item['tanggal_jam'],
                'nama_supplier' => $item['nama_supplier'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();
        $sampleNomorDapur = collect($data)->pluck('nomor_dapur')->random(1);
        // Menghapus data yang memiliki nomor_dapur yang sama dengan sampleNomorDapur
        DB::table('tb_penerima_bahan')
            ->where('nomor_dapur', $sampleNomorDapur)
            ->delete();
        // Menyimpan data baru
        DB::table('tb_penerima_bahan')->insert($data);

        return response()->json([
            'message' => 'Data penerimaan bahan berhasil disimpan!',
            'data' => $request->data
        ], 201);
    }

    public function index()
    {
        // Logika untuk mengambil dan mengembalikan data menu
        $penerimabahan = DB::table('tb_penerima_bahan')->get(); // Ambil semua data menu
        return response()->json($penerimabahan);
    }
}
