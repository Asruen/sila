<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSekolah;
use App\Models\TingkatanSekolah;
use App\Models\DataDapur;
use DataTables;

class DataSekolahController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DataSekolah::with('tb_data_dapur', 'tb_tingkatan_sekolah')
                ->select('id', 'nama_sekolah', 'jenjang_sekolah', 'jumlah_siswa', 'alamat_sekolah', 'id_dapur');

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('jenjang_sekolah', function ($row) {
                    return $row->jenjang_sekolah ? $row->tb_tingkatan_sekolah->jenjang_sekolah : '-';
                })
                ->editColumn('id_dapur', function ($row){
                    return $row->nama_dapur ? $row->tb_data_dapur->nama_dapur : '-';
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

        return view('datasekolah.index', ['header' => 'Master Sekolah']);
    }

    public function create()
    {
        $jenjang_sekolah = TingkatanSekolah::all();
        $id_dapur = DataDapur::all();

        return view('datasekolah.create', ['header' => 'Tambah Sekolah'], compact('jenjang_sekolah', 'id_dapur'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'jenjang_sekolah' => 'required|exists:tb_tingkatan_sekolah,id',
            'jumlah_siswa' => 'required|numeric',
            'alamat_sekolah' => 'required|string|max:255',
            'id_dapur' => 'required|exists:tb_data_dapur,nomor_dapur',
        ]);

        // Simpan ke database
        DataSekolah::create([
            'nama_sekolah' => $request->nama_sekolah,
            'jenjang_sekolah' => $request->jenjang_sekolah,
            'jumlah_siswa' => $request->jumlah_siswa,
            'alamat_sekolah' => $request->alamat_sekolah,
            'id_dapur' => $request->id_dapur,
        ]);

        return redirect()->route('datasekolah.index')->with('success', 'Data sekolah berhasil ditambahkan');
    }
}
