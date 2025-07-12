<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenerimaMakanController extends Controller
{
    // API untuk mendapatkan Penerima Makan Hari Ini
    public function getPenerimaMakan(Request $request)
    {
        $request->validate([
            'nomor_dapur' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        // Simulasi data jumlah penerima makan
        $data = [
            'nomor_dapur' => $request->nomor_dapur,
            'jumlah_a' => 20, // TK - SD Kelas 3
            'jumlah_b' => 50, // SD Kelas 4 - SMA
            'tanggal' => $request->tanggal
        ];

        return response()->json($data);
    }
}
