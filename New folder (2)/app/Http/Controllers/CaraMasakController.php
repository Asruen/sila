<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaraMasak;
use App\Models\Menu;
use DataTables;

class CaraMasakController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CaraMasak::with('menu')
                ->select('id', 'id_menu', 'durasi', 'keterangan_menu')
                ->get();  // Get the data immediately (avoid lazy loading issues)

            dd($data); // Dump the data to check what is being retrieved

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('id_menu', function ($row) {
                    return $row->menu ? $row->menu->nama_menu : '-';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('caramasak.edit', $row->id);
                    $deleteUrl = route('caramasak.destroy', $row->id);
                    return '
                        <a href="'.$editUrl.'" class="btn btn-warning btn-sm">Edit</a>
                        <form action="'.$deleteUrl.'" method="POST" style="display:inline;">
                            '.csrf_field().'
                            '.method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('caramasak.index', ['header' => 'Tata Cara Masak']);
    }

    public function create()
    {
        $menu = Menu::all();
        return view('caramasak.create', ['header' => 'Tata Cara Masak'], compact('menu'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_menu' => 'required|exists:tb_menu,id',
            'durasi' => 'required|string|max:255',
            'keterangan_menu' => 'required|string',
        ]);

        $caramasak = new CaraMasak();
        $caramasak->id_menu = $request->id_menu;
        $caramasak->durasi = $request->durasi;
        $caramasak->keterangan_menu = $request->keterangan_menu;
        $caramasak->save();

        // Redirect dengan pesan sukses
        return redirect()->route('kitchen.dashboard_kitchen')->with('success', 'Tata Cara Masak berhasil ditambahkan!');
    }
}
