<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenu(Request $request)
    {
        $request->validate([
            'nomor_dapur' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        return response()->json([
            'nomor_dapur' => $request->nomor_dapur,
            'tanggal' => $request->tanggal,
            'karbohidrat' => "Nasi",
            'sayur' => "Lodeh",
            'protein' => "Ayam Goreng",
            'buah' => "Melon",
            'susu' => "Susu Sapi"
        ]);
    }
}
