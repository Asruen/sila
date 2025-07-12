<?php

namespace App\Http\Controllers;


use App\Models\Ompreng;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class OmprengController extends Controller
{
    public function storeOmpreng(Request $request)
    {
        $query = Ompreng::query();

        // Filter berdasarkan nomor dapur jika ada
         if ($request->has('nomor_dapur')) {
            $query->where('nomor_dapur', $request->nomor_dapur);
        }
        
        // Ambil data dan hitung total line
        $data = $query->get()->map(function ($item) {
            $item->line_total = 
                ($item->line1 ?? 0) + 
                ($item->line2 ?? 0) + 
                ($item->line3 ?? 0) + 
                ($item->line4 ?? 0) + 
                ($item->line5 ?? 0) + 
                ($item->line6 ?? 0);
            return $item;
        });

        return response()->json($data);
    }

    public function store(Request $request)
{
    $request->validate([
        'data' => 'required|array',
        'data.*.nomor_dapur' => 'required|string|max:255',
        'data.*.tanggal_update' => 'required|date_format:Y-m-d',
        'data.*.line1' => 'nullable|integer|min:0',
        'data.*.line2' => 'nullable|integer|min:0',
        'data.*.line3' => 'nullable|integer|min:0',
        'data.*.line4' => 'nullable|integer|min:0',
        'data.*.line5' => 'nullable|integer|min:0',
        'data.*.line6' => 'nullable|integer|min:0',
    ]);

    $inserted = [];

    foreach ($request->data as $item) {
        $inserted[] = Ompreng::create($item);
    }

    return response()->json([
        'message' => 'Semua data berhasil disimpan',
        'data' => $inserted
    ]);
}

 
     public function index()
    {
        // Logika untuk mengambil dan mengembalikan data menu
        $penerimaompreng = DB::table('tb_penerima_ompreng')->get(); // Ambil semua data menu
        return response()->json($penerimaompreng);
    }
}
