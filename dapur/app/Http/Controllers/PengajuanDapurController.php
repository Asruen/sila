<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanDapur;
use App\Models\PengajuanMenu;
use DataTables;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengajuanDapurExport;

class PengajuanDapurController extends Controller
{
    public function index()
    {
        $header = "Master Pengajuan Dapur";
        if (request()->ajax()) {
            $pengajuandapur = PengajuanDapur::select('id', 'nomor_dapur', 'status', 'keterangan')->get();


            return DataTables::of($pengajuandapur)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('pengajuandapur.show', $row['id']) . '" class="btn btn-success btn-sm">Detail</a>
                                <form action="' . route('pengajuandapur.updateStatus') . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                <input type="hidden" name="id" value="' . $row['id'] . '">
                                <input type="hidden" name="status" value="acc">
                                <input type="hidden" name="keterangan" value="Acc">
                                <button type="submit" class="btn btn-primary btn-sm">Acc</button>
                            </form>
                            <button class="btn btn-danger btn-sm btn-batal" data-id="' . $row['id'] . '">Batal</button>';
                    return $btn;
                })      
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pengajuandapur.index',compact('header'));
    }

    public function create()
    {
        return view('pengajuandapur.create', ['header' => 'Tambah Pengajuan Dapur']);
    }

    /**
     * Menyimpan data pengajuan dapur ke database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nomor_dapur' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        // Menyimpan data ke database
        PengajuanDapur::create([
            'nomor_dapur' => $validated['nomor_dapur'],
            'status' => $validated['status'],
            'keterangan' => $validated['keterangan'],
        ]);

        PengajuanMenu::create([
            'nomor_dapur' => $validated['nomor_dapur'],
            'status' => $validated['status'],
            'keterangan' => $validated['keterangan'],
        ]);

        // Redirect ke halaman lain setelah sukses
        return redirect()->route('pengajuandapur.index')->with('success', 'Data Pengajuan Dapur berhasil ditambahkan');
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
            $pengajuandapur = PengajuanDapur::findOrFail($request->id);
            $pengajuandapur->status = $request->status;
            $pengajuandapur->keterangan = $request->keterangan;
            $pengajuandapur->save();

            // Update tb_approve_pengajuan_po sesuai dengan perubahan di tb_pengajuan_po
            $pengajuanmenu = PengajuanMenu::where('id', $pengajuandapur->id)->first();
            if ($pengajuanmenu) {
                $pengajuanmenu->status = $pengajuandapur->status;
                $pengajuanmenu->keterangan = $pengajuandapur->keterangan;
                $pengajuanmenu->save();
            }

            return redirect()->route('pengajuandapur.index')->with('success', 'Data Pengajuan PO berhasil diperbarui');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Terjadi kesalahan. Silakan coba lagi."
            ], 500);
        }
    }

    public function exportPengajuanDapur(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date; // Format waktu akhir

        return Excel::download(new PengajuanDapurExport($start_date, $end_date), 'pengajuandapur.xlsx');
    }
}
