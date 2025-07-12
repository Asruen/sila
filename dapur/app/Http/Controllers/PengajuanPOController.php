<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanPO;
use App\Models\ApprovePengajuanPo;
use DataTables;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengajuanPOExport;

class PengajuanPOController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pengajuanpo = PengajuanPO::select('id', 'nomor_pengajuan', 'total_pengajuan', 'status', 'keterangan');

            return DataTables::of($pengajuanpo)
                ->addIndexColumn() // ✅ Pastikan nomor urut otomatis ada
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('pengajuanpo.show', $row->id) . '" class="btn btn-success btn-sm">Detail</a>
                            <form action="' . route('pengajuanpo.updateStatus') . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                <input type="hidden" name="id" value="' . $row->id . '">
                                <input type="hidden" name="status" value="acc">
                                <input type="hidden" name="keterangan" value="Acc">
                                <button type="submit" class="btn btn-primary btn-sm">Acc</button>
                            </form>
                            <button class="btn btn-danger btn-sm btn-batal" data-id="' . $row->id . '">Batal</button>';
                })
                ->rawColumns(['action']) // ✅ Agar HTML tombol bisa tampil di tabel
                ->toJson(); // ✅ Gunakan toJson() untuk memastikan hasil JSON valid
        }

        // 🔹 Jika request dari browser biasa, kembalikan tampilan
        $header = "Master Pengajuan PO";
        return view('pengajuanpo.index', compact('header'));
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nomor_pengajuan' => 'required|string|max:255',
            'total_pengajuan' => 'required|numeric',
            'status' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $pengajuanPO = PengajuanPO::create($validated);
            ApprovePengajuanPo::create([
                'id' => $pengajuanPO->id,
                'nomor_pengajuan' => $validated['nomor_pengajuan'],
                'total_pengajuan' => $validated['total_pengajuan'],
                'status' => $validated['status'],
                'keterangan' => $validated['keterangan']
            ]);

            DB::commit();

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Pengajuan PO berhasil ditambahkan',
                    'data' => $pengajuanPO
                ], 201);
            }
            return response()->json(['message'=>'berhasil']);
            //return redirect()->route('pengajuanpo.index')->with('success', 'Data Pengajuan PO berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data Pengajuan PO',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tb_pengajuan_po,id',
            'status' => 'required|string|in:acc,batal',
            'keterangan' => 'required|string|max:255',
        ]);

        try {
            // Update tb_pengajuan_po
            $pengajuanpo = PengajuanPO::findOrFail($request->id);
            $pengajuanpo->status = $request->status;
            $pengajuanpo->keterangan = $request->keterangan;
            $pengajuanpo->save();

            // Update tb_approve_pengajuan_po sesuai dengan perubahan di tb_pengajuan_po
            $approvePengajuanPO = ApprovePengajuanPO::where('id', $pengajuanpo->id)->first();
            if ($approvePengajuanPO) {
                $approvePengajuanPO->status = $pengajuanpo->status;
                $approvePengajuanPO->keterangan = $pengajuanpo->keterangan;
                $approvePengajuanPO->save();
            }

            return redirect()->route('pengajuanpo.index')->with('success', 'Data Pengajuan PO berhasil diperbarui');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Terjadi kesalahan. Silakan coba lagi."
            ], 500);
        }
    }

    public function exportPengajuanPO(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date; // Format waktu akhir

        return Excel::download(new PengajuanPoExport($start_date, $end_date), 'pengajuanpo.xlsx');
    }
}
