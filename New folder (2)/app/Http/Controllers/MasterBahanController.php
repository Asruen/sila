<?php

namespace App\Http\Controllers;

use App\Models\TbMasterBahan;
use App\Models\TbSatuan;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
//import return type View
use Illuminate\View\View;
//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class MasterBahanController extends Controller
{
    public function index()
    {
        $header = "Master Bahan";
        if (request()->ajax()) {
        //$users = User::query();
            $bahan = TbMasterBahan::join('tb_satuan as sb','tb_master_bahan.satuan_bahan','sb.id')
                    ->join('tb_satuan as sg', 'tb_master_bahan.satuan_gudang', 'sg.id')
                    ->select(['tb_master_bahan.*','sb.satuan as nama_satuan_bahan', 'sg.satuan as nama_satuan_gudang']);
           
            
            return DataTables::of($bahan)
                ->addIndexColumn() // Menambah index
                
                ->addColumn('action', function ($row) {
                // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>';
                /* $btn = '<a href="'. route('master_bahan.edit', $row['id']) .'" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('master_bahan.delete', $row['id']) . '" class="edit btn btn-danger btn-sm delete-button" id="btn-delete-post " data-id="' . $row['id'] . '" >Delete</a>';
                    */
                   $btn = '<a href="' . route('master_bahan.edit', $row['id']) . '" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('master_bahan.delete', $row->id) . '" 
                            class="edit btn btn-danger btn-sm delete-button" 
                            data-id="' . $row->id . '">Delete</a>';
                    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
               
        }
        return view('masterbahan.index',compact('header'));
        
        

    }

    public function edit(string $id): View
    {
        $header = "Edit Master Bahan";
        //get product by ID
        $bahan = TbMasterBahan::findOrFail($id);
        $satuan = TbSatuan::all();
        //render view with product
        return view('masterbahan.edit', compact('bahan','satuan','header'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'bahan'         => 'required|min:5',
            'gramasi'   => 'required|min:1',
            'satuan_gudang'   => 'required|min:1',
            'satuan_bahan'   => 'required|min:1',
           
        ]);

        //get product by ID
        $bahan = TbMasterBahan::findOrFail($id);



        //update product without image
        $bahan->update([
            'bahan'             => $request->bahan,
            'gramasi'           => $request->gramasi,
            'satuan_gudang'     => $request->satuan_gudang,
            'satuan_bahan'      => $request->satuan_bahan

        ]);

        
        //redirect to index
        return redirect()->route('master_bahan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function create(): View
    {
        $header = "Add Master Bahan";
        $satuan = TbSatuan::all();
        return view('masterbahan.create', compact( 'satuan','header'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'bahan'         => 'required|min:5',
            'gramasi'   => 'required|min:1',
            'satuan_gudang'   => 'required|min:1',
            'satuan_bahan'   => 'required|min:1',

        ]);


        //create product
        TbMasterBahan::create([
            'bahan'             => $request->bahan,
            'gramasi'           => $request->gramasi,
            'satuan_gudang'     => $request->satuan_gudang,
            'satuan_bahan'      => $request->satuan_bahan
        ]);

        //redirect to index
        return redirect()->route('master_bahan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        //get product by ID
        $bahan = TbMasterBahan::findOrFail($id);


        //delete product
        $bahan->delete();

        //redirect to index
        return redirect()->route('master_bahan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    
}
