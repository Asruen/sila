<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbOmpreng;
use DataTables;
use Illuminate\Support\Facades\DB;

class omprengController extends Controller
{
    //
    public function v_ompreng()
    {
        $header = "ompreng";
        $jumlah_rantang = TbOmpreng::where('jenis', 'Rantang')->count();
        $jumlah_ompreng = TbOmpreng::where('jenis', 'Ompreng')->count();
        return view('ompreng.ompreng', compact('header', 'jumlah_rantang', 'jumlah_ompreng'));
    }

    public function dt_ompreng(Request $request)
    {
        $table = TbOmpreng::where('jenis', 'Ompreng')->get();
        return DataTables::of($table)
            ->addIndexColumn()
            ->addColumn('action', function ($table) {
                return '<a href="#" class="btn btn-xs btn-primary">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function dt_rantang(Request $request)
    {
        $table = TbOmpreng::where('jenis', 'Rantang')->get();
        return DataTables::of($table)
            ->addIndexColumn()
            ->addColumn('action', function ($table) {
                return '<a href="#" class="btn btn-xs btn-primary">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
