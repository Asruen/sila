<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan ini!

class PenerimaMakanController extends Controller
{
    public function storePenerimaMakan(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'nomor_dapur' => 'required|string',
            'tanggal' => 'required|date', // Format tanggal harus valid
            'jumlah_tk_sd_kls3' => 'required|string',
            'jumlah_sd_kls4_sma' => 'required|string'
        ]);

        // Cek apakah sudah ada data dengan nomor_dapur yang sama
        $existingEntry = DB::table('tb_penerima_makan')
            ->where('nomor_dapur', $request->nomor_dapur)
            ->first();

        if ($existingEntry) {
            // Jika ada, update data yang ada
            DB::table('tb_penerima_makan')
                ->where('id', $existingEntry->id) // Update berdasarkan ID
                ->update([
                    'tanggal' => $request->tanggal,
                    'jumlah_tk_sd_kls3' => $request->jumlah_tk_sd_kls3,
                    'jumlah_sd_kls4_sma' => $request->jumlah_sd_kls4_sma,
                    'updated_at' => now(),
                ]);

            return response()->json([
                'message' => 'Data penerima makan berhasil diperbarui!',
                'data' => $existingEntry // Return the existing entry
            ], 200); // OK status code
        } else {
            // Jika tidak ada, simpan data baru ke database
            DB::table('tb_penerima_makan')->insert([
                'nomor_dapur' => $request->nomor_dapur,
                'tanggal' => $request->tanggal,
                'jumlah_tk_sd_kls3' => $request->jumlah_tk_sd_kls3,
                'jumlah_sd_kls4_sma' => $request->jumlah_sd_kls4_sma,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'message' => 'Penerima Makan berhasil disimpan!',
                'data' => $request->all()
            ], 201); // Created status code
        }
    }

    public function index()
    {
        // Logika untuk mengambil dan mengembalikan data menu
        $penerimamakan = DB::table('tb_penerima_makan')->get(); // Ambil semua data menu
        return response()->json($penerimamakan);
    }
}
