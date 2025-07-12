<?php

namespace App\Http\Controllers\kitchen;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\CaraMasak;
use App\Models\Menu;
use DataTables;

class KitchenController extends Controller
{
    //
    public function index()
    {
        $header = "Dashboard Kitchen";
        return view('kitchen.dashboard', compact('header'));
    }
    public function indexCaraMasak()
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
        return view('office/caramasak.index', ['header' => 'Tata Cara Masak']);
    }
}
