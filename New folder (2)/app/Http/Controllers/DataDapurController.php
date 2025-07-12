<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDapur;
use App\Models\KabKota;
use App\Models\Provinsi;
use DataTables;

class DataDapurController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDapur::with('tb_kabkota', 'tb_provinsi')
                ->select('id', 'nama_dapur', 'alamat_dapur', 'nomor_dapur', 'kota', 'provinsi');

            return DataTables::of($data)
                ->addIndexColumn()
                /*->editColumn('kota', function ($row) {
                    return $row->kabupaten_kota ? $row->tb_kabkota->kabupaten_kota : '-';
                })
                ->editColumn('provinsi', function ($row){
                    return $row->provinsi ? $row->tb_provinsi->provinsi : '-';
                })*/
                ->addColumn('action', function ($row) {
                    /*$btn = '<a href="' . route('datadapur.edit', $row['id']) . '" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('datadapur.delete', $row->id) . '"
                            class="edit btn btn-danger btn-sm delete-button" 
                            data-id="' . $row->id . '">Delete</a>';
                    */
                    $btn = '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('datadapur.index', ['header' => 'Master Dapur']);
    }

    public function create()
    {
        $kota = KabKota::all();
        $provinsi = Provinsi::all();

        return view('datadapur.create', ['header' => 'Tambah Dapur'], compact('kota', 'provinsi'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_dapur' => 'required|string|max:255',
            'alamat_dapur' => 'required|string',
            'nomor_dapur' => 'required|numeric',
            'kota' => 'required|exists:tb_kabkota,id',
            'provinsi' => 'required|exists:tb_provinsi,id',
        ]);

        // Simpan ke database
        Dapur::create([
            'nama_dapur' => $request->nama_dapur,
            'alamat_dapur' => $request->alamat_dapur,
            'nomor_dapur' => $request->nomor_dapur,
            'kota_id' => $request->kota,
            'provinsi_id' => $request->provinsi,
        ]);

        return redirect()->route('datadapur.index')->with('success', 'Data dapur berhasil ditambahkan');
    }
}
