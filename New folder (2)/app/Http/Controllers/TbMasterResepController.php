<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Resep;
use App\Models\KomponenSehat;
use Illuminate\Http\Request;


use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
//import return type View
use Illuminate\View\View;
//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class TbMasterResepController extends Controller
{
    //
    public function index()
    {
        $header = "Master Resep";
        if (request()->ajax()) {
            //$users = User::query();
            $Resep = Resep::join('tb_menu as m_karbo', 'tb_resep.karbohidrat', '=', 'm_karbo.id')
            ->join('tb_menu as m_protein', 'tb_resep.protein', '=', 'm_protein.id')
            ->join('tb_menu as m_sayur', 'tb_resep.sayur', '=', 'm_sayur.id')
            ->join('tb_menu as m_buah', 'tb_resep.buah', '=', 'm_buah.id')
            ->join('tb_menu as m_susu', 'tb_resep.susu', '=', 'm_susu.id')->select(
                
                'tb_resep.*',
                'm_karbo.nama_menu as nama_karbohidrat',
                'm_protein.nama_menu as nama_protein',
                'm_sayur.nama_menu as nama_sayur',
                'm_buah.nama_menu as nama_buah',
                'm_susu.nama_menu as nama_susu'
            )
            ->get();


            return DataTables::of($Resep)
                ->addIndexColumn() // Menambah index

                ->addColumn('action', function ($row) {
                // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>';
                /* $btn = '<a href="'. route('master_bahan.edit', $row['id']) .'" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('master_bahan.delete', $row['id']) . '" class="edit btn btn-danger btn-sm delete-button" id="btn-delete-post " data-id="' . $row['id'] . '" >Delete</a>';
                    */
                    $btn = '<a href="' . route('masterresep.edit', $row['id']) . '" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                                <a href="' . route('masterresep.delete', $row['id']) . '" class="edit btn btn-danger btn-sm delete-button" id="btn-delete-post " data-id="' . $row['id'] . '" >Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('masterresep.index', compact('header'));
    }


    public function edit(string $id): View
    {
        $header = "Edit Resep";
        //get product by ID
        $Resep = Resep::findOrFail($id);
        $karbohidrat = Menu::where('id_komponen_sehat', 1)->get();
        $protein = Menu::where('id_komponen_sehat', 2)->get();
        $sayur = Menu::where('id_komponen_sehat', 3)->get();
        $buah = Menu::where('id_komponen_sehat', 4)->get();
        $susu = Menu::where('id_komponen_sehat', 5)->get();
        

        //render view with product
        return view('masterresep.edit', compact('Resep', 'karbohidrat', 'protein', 'sayur','buah','susu', 'header'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'resep'         => 'required|min:1',


        ]);

        //get product by ID
        $resep = Resep::findOrFail($id);



        //update product without image
        $resep->update([
            'resep'             => $request->resep,
            'karbohidrat'             => $request->karbohidrat,
            'protein'             => $request->protein,
            'sayur'             => $request->sayur,
            'buah'             => $request->buah,
            'susu'             => $request->susu,
        ]);


        //redirect to index
        return redirect()->route('masterresep.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function create(): View
    {
        $header = "Tambah Resep";
        $Resep = Resep::all();
        $karbohidrat = Menu::where('id_komponen_sehat', 1)->get();
        $protein = Menu::where('id_komponen_sehat', 2)->get();
        $sayur = Menu::where('id_komponen_sehat', 3)->get();
        $buah = Menu::where('id_komponen_sehat', 4)->get();
        $susu = Menu::where('id_komponen_sehat', 5)->get();


        //render view with product
        return view('masterresep.create', compact('Resep', 'karbohidrat', 'protein', 'sayur', 'buah', 'susu', 'header'));
        
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'resep'         => 'required|min:1',
        ]);


        //create product
        Resep::create([
            'resep'             => $request->resep,
            'karbohidrat'             => $request->karbohidrat,
            'protein'             => $request->protein,
            'sayur'             => $request->sayur,
            'buah'             => $request->buah,
            'susu'             => $request->susu,

        ]);

        //redirect to index
        return redirect()->route('masterresep.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        //get product by ID
        $Resep = Resep::findOrFail($id);


        //delete product
        $Resep->delete();

        //redirect to index
        return redirect()->route('masterresep.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
