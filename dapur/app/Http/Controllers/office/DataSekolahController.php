<?php

namespace App\Http\Controllers\office;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\DataSekolah;
use App\Models\TingkatanSekolah;
use App\Models\DataDapur;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SekolahExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class DataSekolahController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DataSekolah::select('id', 'nama_sekolah', 'jenjang_sekolah', 'jumlah_siswa', 'alamat_sekolah', 'id_dapur');

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('jenjang_sekolah', function ($row) {
                    $tingkat = TingkatanSekolah::findOrFail($row->jenjang_sekolah);
                    return $tingkat->jenjang_sekolah ;
                })
                ->editColumn('nomor_dapur', function ($row){
                    $dapur = DataDapur::findOrFail($row->id_dapur);
                    return $dapur->nomor_dapur;
                })
                ->addColumn('action', function ($row) {
                    /*$btn = '<a href="' . route('datasekolah.edit', $row['id']) . '" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('datasekolah.delete', $row->id) . '"
                            class="edit btn btn-danger btn-sm delete-button" 
                            data-id="' . $row->id . '">Delete</a>';
                    */
                    $btn = '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('office/datasekolah.index', ['header' => 'Master Sekolah']);
    }

    public function create()
    {
        $jenjang_sekolah = TingkatanSekolah::all();
        $id_dapur = DataDapur::all();

        return view('office/datasekolah.create', ['header' => 'Tambah Sekolah'], compact('jenjang_sekolah', 'id_dapur'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'jenjang_sekolah' => 'required|exists:tb_tingkatan_sekolah,id',
            'jumlah_siswa' => 'required|numeric',
            'alamat_sekolah' => 'required|string|max:255',
            'id_dapur' => 'required',
        ]);
        
        // Simpan ke database
        DataSekolah::create([
            'nama_sekolah'      => $request->nama_sekolah,
            'jenjang_sekolah'   => $request->jenjang_sekolah,
           
            'jumlah_siswa'      => $request->jumlah_siswa,
            'alamat_sekolah'    => $request->alamat_sekolah,
            'id_dapur'          => $request->id_dapur,
        ]);

        return redirect()->route('datasekolah.index')->with('success', 'Data sekolah berhasil ditambahkan');
    }

    public function exportSekolah(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        return Excel::download(new SekolahExport($start_date, $end_date), 'data_sekolah.xlsx');
    }

    public function exportPdf(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Ubah start_date dan end_date
        $start_date = Carbon::parse($request->start_date)->subDay(); // Kurangi 1 hari
        $end_date = Carbon::parse($request->end_date)->addDay(); // Tambah 1 hari

        // Ambil data supplier berdasarkan rentang tanggal
        $sekolah = DataSekolah::whereBetween('created_at', [$start_date, $end_date])->get();

        // Generate PDF menggunakan DomPDF
        $pdf = Pdf::loadView('office/datasekolah.sekolah_pdf', compact('sekolah', 'start_date', 'end_date'));

        // Unduh atau tampilkan PDF
        return $pdf->download('sekolah_data.pdf');
    }
}
