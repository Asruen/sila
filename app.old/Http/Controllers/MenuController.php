<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan ini!

class MenuController extends Controller
{
    public function storeMenu(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'tanggal'   => 'required|date', // Format tanggal harus valid
            'karbohidrat' => 'required|string',
            'protein' => 'required|string',
            'sayur' => 'required|string',
            'buah' => 'required|string',
            'susu' => 'required|string'
        ]);

        // Cek apakah sudah ada data dengan nomor_dapur yang sama
        $existingEntry = DB::table('tb_menu_hari_ini')
            ->where('nomor_dapur', $request->nomor_dapur)
            ->first();

        if ($existingEntry) {
            // Jika ada, update data yang ada
            DB::table('tb_menu_hari_ini')
                ->where('id', $existingEntry->id) // Update berdasarkan ID
                ->update([
                    'tanggal' => $request->tanggal,
                    'karbohidrat' => $request->karbohidrat,
                    'protein' => $request->protein,
                    'sayur' => $request->sayur,
                    'buah' => $request->buah,
                    'susu' => $request->susu,
                    'updated_at' => now(),
                ]);
                
            return response()->json([
                'message' => 'Data menu hari ini berhasil diperbarui!',
                'data' => $existingEntry // Return the existing entry
            ], 200); // OK status code
        } else {
            // Jika tidak ada, simpan data baru ke database
            DB::table('tb_menu_hari_ini')->insert([
                'nomor_dapur' => $request->nomor_dapur,
                'tanggal' => $request->tanggal,
                'karbohidrat' => $request->karbohidrat,
                'protein' => $request->protein,
                'sayur' => $request->sayur,
                'buah' => $request->buah,
                'susu' => $request->susu,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'message' => 'Menu hari ini berhasil disimpan!',
                'data' => $request->all()
            ], 201); // Created status code
        }
    }

    public function index()
    {
        // Logika untuk mengambil dan mengembalikan data menu
        $menus = DB::table('tb_menu_hari_ini')->get(); // Ambil semua data menu
        return response()->json($menus);
    }
}
