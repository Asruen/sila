<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenerimaBahanController extends Controller
{
    // API untuk mendapatkan Penerima Bahan
    public function getPenerimaBahan(Request $request)
    {
        $request->validate([
            'nomor_dapur' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        // Simulasi data jumlah penerima bahan
        $data = [
            'nomor_dapur' => $request->nomor_dapur,
            'bahan' => 'Daging',
            'jumlah' => 90,
            'nama_supplier' => 'PT Sumber Berkah',
            'tanggal' => $request->tanggal
        ];

        return response()->json($data);
    }
}
