<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Models\MenuBahan;
use App\Models\KomponenSehat;
use App\Models\TbMasterBahan;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
//import return type View
use Illuminate\View\View;
//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class TbMenuController extends Controller
{

    public function index()
    {
        $header = "Dashboard Menu";
        if (request()->ajax()) {
            //$users = User::query();
            $Menu = Menu::join('tb_komponen_sehat','tb_menu.id_komponen_sehat','tb_komponen_sehat.id')
            ->select(['tb_menu.*', 'tb_komponen_sehat.komponen as nama_komponen']);


            return DataTables::of($Menu)
                ->addIndexColumn() // Menambah index

                ->addColumn('action', function ($row) {
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>';
                    /* $btn = '<a href="'. route('master_bahan.edit', $row['id']) .'" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('master_bahan.delete', $row['id']) . '" class="edit btn btn-danger btn-sm delete-button" id="btn-delete-post " data-id="' . $row['id'] . '" >Delete</a>';
                    */
                    $btn = '<a href="' . route('detailmenu.index', $row['id']) . '" class="edit btn btn-success btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">detail</a>
                            <a href="' . route('menu.edit', $row['id']) . '" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('menu.delete', $row->id) . '" 
                            class="edit btn btn-danger btn-sm delete-button" 
                            data-id="' . $row->id . '">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.index',compact('header'));
    }

    public function edit(string $id): View
    {
        $header = "Edit Menu";
        //get product by ID
        $Menu = Menu::findOrFail($id);
        $KomponenSehat = KomponenSehat::all();
        //render view with product
        return view('menu.edit', compact( 'Menu','header', 'KomponenSehat'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_menu'         => 'required|min:1',


        ]);

        //get product by ID
        $Menu = Menu::findOrFail($id);



        //update product without image
        $Menu->update([
            'nama_menu'              => $request->nama_menu,
            'id_komponen_sehat'     => $request->id_komponen_sehat,
        ]);


        //redirect to index
        return redirect()->route('menu.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function create(): View
    {
        $header = "Tambah Menu";
        $KomponenSehat = KomponenSehat::all();
        return view('menu.create', compact('KomponenSehat', 'header'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_menu'         => 'required|min:1',
        ]);


        //create product
        Menu::create([
            'nama_menu'                  => $request->nama_menu,
            'id_komponen_sehat'    => $request->id_komponen_sehat,

        ]);

        //redirect to index
        return redirect()->route('menu.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        //get product by ID
        $Menu = Menu::findOrFail($id);


        //delete product
        $Menu->delete();

        //redirect to index
        return redirect()->route('menu.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function detailmenu($id)
    {
        $header = "Detail Menu";
        //get product by ID
        $menu_id = $id;
        if (request()->ajax()) {
            //$users = User::query();
            $menu = MenuBahan::join('tb_master_bahan','tb_menu_bahan.bahan_id','tb_master_bahan.id')
                               ->join('tb_satuan', 'tb_menu_bahan.id_satuan','tb_satuan.id')
                                ->where('menu_id', $id)
                                ->select('tb_menu_bahan.*', 'tb_master_bahan.bahan as nama_bahan','tb_satuan.satuan as nama_satuan_bahan')->get();


            return DataTables::of($menu)
            ->addIndexColumn() // Menambah index

                ->addColumn('action', function ($row) {
                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>';
                    /* $btn = '<a href="'. route('master_bahan.edit', $row['id']) .'" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('master_bahan.delete', $row['id']) . '" class="edit btn btn-danger btn-sm delete-button" id="btn-delete-post " data-id="' . $row['id'] . '" >Delete</a>';
                    */
                    $btn = '<a href="' . route('detailmenu.edit_detail_menu', $row['id']) . '" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('prosesdeletebahan', $row['id']) . '" class="delete btn btn-danger btn-sm " id="btn-delete-post" data-id="' . $row['id'] . '">Delete</a>
                            ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        //redirect to index
        return view('menu.detailmenu',compact('menu_id','header'));
    }

    public function tambahbahan(string $id)
    {
        $header = "Tambah Bahan Menu";
        //get product by ID
        $menu_id = $id;
        $masterbahan = TbMasterBahan::join('tb_satuan', 'tb_master_bahan.satuan_bahan', 'tb_satuan.id')
                                        ->select('tb_master_bahan.*', 'tb_satuan.satuan as nama_satuan')->get();
        
        //$masterbahan = TbMasterBahan::get();
                                        //render view with product
        return view('menu.tambahdetailmenu', compact('masterbahan', 'menu_id','header'));
    }

    public function storetambahbahan(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'bahan_id'         => 'required|min:1',
            'jumlah'         => 'required|min:1',
        ]);

        $masterbahan = TbMasterBahan::where('id', $request->bahan_id)->first();


        //create product
        MenuBahan::create([
            'menu_id'              => $request->menu_id,
            'bahan_id'             => $request->bahan_id,
            'jumlah'               => $request->jumlah,
            'id_satuan'            => $masterbahan->satuan_bahan

        ]);

        //redirect to index
        // return redirect('/menu')->with(['success' => 'Data Berhasil Disimpan!']);
        return redirect()->route('detailmenu.index', $request->menu_id)->with(['success' => 'Data Berhasil Disimpan!']);
    
    }

    public function editbahan(string $id): View
    {
        $header = "Edit Bahan Menu";
        //get product by ID
        $menubahan = MenuBahan::findOrFail($id);
        $masterbahan = TbMasterBahan::join('tb_satuan', 'tb_master_bahan.satuan_bahan', 'tb_satuan.id')
        ->select('tb_master_bahan.*', 'tb_satuan.satuan as nama_satuan')->get();
        //render view with product
        return view('menu.editdetailmenu', compact('menubahan', 'masterbahan','header'));
    }

    public function edittambahbahan(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'jumlah'         => 'required|min:1',
        ]);

        $masterbahan = TbMasterBahan::where('id', $request->bahan_id)->first();
        $MenuBahan = MenuBahan::findOrFail($request->id);

        $MenuBahan->update([
            //'bahan_id'             => $request->bahan_id,
            'jumlah'               => $request->jumlah,
        ]);

        //redirect to index
        return redirect()->route('detailmenu.index', $MenuBahan->menu_id)->with(['success' => 'Data Berhasil Disimpan!']);
    
    }

    public function deletedetailbahan($id)
    {
        //get product by ID
        $MenuBahan = MenuBahan::findOrFail($id);
        $id = $MenuBahan->menu_id;

        //delete product
        $MenuBahan->delete();

        //redirect to index
        return redirect()->route('detailmenu.index', $id)->with(['success' => 'Data Berhasil Disimpan!']);
    
    }
}
