<?php

namespace App\Http\Controllers\office;

use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Models\Resep;
use App\Models\rincian_menu_harian;
use App\Models\MenuBahan;
use App\Models\rincian_sekolah;
use App\Models\DataSekolah;
use App\Models\DataDapur;
use App\Models\TingkatanSekolah;
use Barryvdh\DomPDF\Facade\Pdf;



use App\Models\KomponenSehat;
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
use Carbon\Carbon;

class TbMasterMenuController extends Controller
{
    //
    public function index()
    {
        $header = "Pengajuan Menu";
        if (request()->ajax()) {
            //$users = User::query();
             $Menu = Menu::join('tb_resep as m_karbo', 'tb_menu.karbohidrat', '=', 'm_karbo.id')
            ->join('tb_resep as m_protein', 'tb_menu.protein', '=', 'm_protein.id')
            ->join('tb_resep as m_sayur', 'tb_menu.sayur', '=', 'm_sayur.id')
            ->join('tb_resep as m_buah', 'tb_menu.buah', '=', 'm_buah.id')
            ->join('tb_resep as m_susu', 'tb_menu.susu', '=', 'm_susu.id')->select(
                
                'tb_menu.*',
                'm_karbo.nama_resep as nama_karbohidrat',
                'm_protein.nama_resep as nama_protein',
                'm_sayur.nama_resep as nama_sayur',
                'm_buah.nama_resep as nama_buah',
                'm_susu.nama_resep as nama_susu'
            )
            ->get();
            
            //$Menu = Menu::all();
            return DataTables::of($Menu)
                ->addIndexColumn() // Menambah index

                ->addColumn('action', function ($row) {
                // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>';
                /* $btn = '<a href="'. route('master_bahan.edit', $row['id']) .'" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('master_bahan.delete', $row['id']) . '" class="edit btn btn-danger btn-sm delete-button" id="btn-delete-post " data-id="' . $row['id'] . '" >Delete</a>';
                    */
                    $btn = '<a href="' . route('mastermenu.edit', $row['id']) . '" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                            <a href="' . route('mastermenu.delete', $row['id']) . '" class="edit btn btn-danger btn-sm delete-button" id="btn-delete-post " data-id="' . $row['id'] . '" >Delete</a>
                            <a href="' . route('rincian_bahan', $row['id']) . '" class="edit btn btn-success btn-sm delete-button" id="btn-delete-post " data-id="' . $row['id'] . '" >Detail Bahan</a>
                            <a href="' . route('pdf_pengajuan_menu', $row['id']) . '" class="edit btn btn-secondary btn-sm " id="btn-download-post">Download</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('office/mastermenu.index', compact('header'));
    }


    public function edit(string $id): View
    {
        $header = "Edit Menu";
        //get product by ID
        $Menu = Menu::findOrFail($id);
        $karbohidrat = Resep::where('id_komponen_sehat', 1)->get();
        $protein = Resep::where('id_komponen_sehat', 2)->get();
        $sayur = Resep::where('id_komponen_sehat', 3)->get();
        $buah = Resep::where('id_komponen_sehat', 4)->get();
        $susu = Resep::where('id_komponen_sehat', 5)->get();
        

        //render view with product
        return view('office/mastermenu.edit', compact('Menu', 'karbohidrat', 'protein', 'sayur','buah','susu', 'header'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'menu'         => 'required|min:1',
            'karbohidrat'  => 'required',
            'protein'      => 'required',
            'sayur'        => 'required',
            'buah'         => 'required',
            'susu'         => 'required',
            'nama_pengaju' => 'required',
            'tanggal_pengajuan' => 'required|min:1',
            'tanggal_kirim' => 'required|min:1'


        ]);

        //get product by ID
        $menu = Menu::findOrFail($id);



        //update product without image
        $menu->update([
            'menu'                      => $request->menu,
            'karbohidrat'               => $request->karbohidrat,
            'protein'                   => $request->protein,
            'sayur'                     => $request->sayur,
            'buah'                      => $request->buah,
            'susu'                      => $request->susu,
            'nama_pengaju'              => $request->nama_pengaju,
            'tanggal_pengajuan'         => $request->tanggal_pengajuan,
            'tanggal_kirim'             => $request->tanggal_kirim,
            'nomor_pengajuan'           => ''
        ]);
        
        //redirect to index
        return redirect()->route('mastermenu.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function create(): View
    {
        $header = "Tambah menu";
        $Menu = Menu::all();
        $karbohidrat = Resep::where('id_komponen_sehat', 1)->get();
        $protein = Resep::where('id_komponen_sehat', 2)->get();
        $sayur = Resep::where('id_komponen_sehat', 3)->get();
        $buah = Resep::where('id_komponen_sehat', 4)->get();
        $susu = Resep::where('id_komponen_sehat', 5)->get();


        //render view with product
        return view('office/mastermenu.create', compact('Menu', 'karbohidrat', 'protein', 'sayur', 'buah', 'susu', 'header'));
        
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'menu'         => 'required|min:1',
            'nama_pengaju' => 'required|min:1',
            'tanggal_pengajuan' => 'required|min:1',
            'tanggal_kirim' => 'required|min:1'
            

        ]);


        //create product
        Menu::create([
            'menu'              => $request->menu,
            'karbohidrat'       => $request->karbohidrat,
            'protein'           => $request->protein,
            'sayur'             => $request->sayur,
            'buah'              => $request->buah,
            'susu'              => $request->susu,
            'nama_pengaju'      => $request->nama_pengaju,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'tanggal_kirim'     => $request->tanggal_kirim,
            'nomor_pengajuan'   => ''

        ]);
        $data_terakhir = Menu::latest()->first();
        $sekolah = DataSekolah::select('id', 'nama_sekolah', 'jumlah_siswa')->get();
        foreach ($sekolah as $data) {
            rincian_sekolah::create([
                'id_menu_harian' => $data_terakhir->id,
                'id_sekolah' => $data->id,
                'jumlah_penerima' => $data->jumlah_siswa,
                'status' => 0
            ]);
        }
        
        //redirect to index
        //return redirect()->route('mastermenu.index')->with(['success' => 'Data Berhasil Disimpan!']);
        return redirect()->route('rincian_sekolah_harian', $data_terakhir->id)->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        //get product by ID
        $Menu = Menu::findOrFail($id);


        //delete product
        $Menu->delete();

        //redirect to index
        return redirect()->route('mastermenu.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

        public function index_rincian_sekolah_harian($idmenu)
        {
            $header = "Rincian Sekolah Penerima";
            $data_menu_harian = Menu::where('id', $idmenu)->first();
            $dapur = DataDapur::first();
            $jumlah = rincian_sekolah::where('id_menu_harian', $idmenu)->sum('jumlah_penerima');

        if (request()->ajax()) {
                //$users = User::query();
                $sekolah = rincian_sekolah::where('id_menu_harian', $idmenu)->join('tb_data_sekolah as d_sekolah', 'rincian_sekolah.id_sekolah', '=', 'd_sekolah.id')
                    ->select('rincian_sekolah.*', 'd_sekolah.nama_sekolah as sekolah', 'd_sekolah.jenjang_sekolah')
                    ->get();

                //$Menu = Menu::all();
                return DataTables::of($sekolah)
                    ->addIndexColumn() // Menambah index
                    ->addColumn('nama_dan_tingkat_sekolah', function ($row){
                        $tingkat = TingkatanSekolah::where('id',$row->jenjang_sekolah)->first();
                        return $row->sekolah." (".$tingkat->jenjang_sekolah.")";
                    })
                    ->addColumn('input_jumlah', function ($row) {
                        return '<input type="number" class="form-control jumlah" data-id="' . $row->id . '" value="' . $row->jumlah_penerima . '">';
                    })
                    ->addColumn('action', function ($row) {
                // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>';
                /* $btn = '<a href="'. route('master_bahan.edit', $row['id']) .'" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                                <a href="' . route('master_bahan.delete', $row['id']) . '" class="edit btn btn-danger btn-sm delete-button" id="btn-delete-post " data-id="' . $row['id'] . '" >Delete</a>';
                        */
                /*$btn = '<a href="' . route('mastermenu.edit', $row['id']) . '" class="edit btn btn-primary btn-sm " id="btn-edit-post" data-id="' . $row['id'] . '">Edit</a>
                                    <a href="' . route('mastermenu.delete', $row['id']) . '" class="edit btn btn-danger btn-sm delete-button" id="btn-delete-post " data-id="' . $row['id'] . '" >Delete</a>';
                        */

                //return $btn;
                    return '<button class="btn btn-success btn-sm update-jumlah" data-id="' . $row->id . '">Update</button>';
                    })
                    ->rawColumns(['action', 'input_jumlah'])
                    ->make(true);
            }
            return view('office/mastermenu.index_rincian_sekolah', compact('header', 'data_menu_harian','dapur', 'jumlah', 'idmenu'));
        }

        public function updateJumlahSekolah(Request $request)
        {
            $request->validate([
                'id' => 'required|exists:rincian_sekolah,id',
                'jumlah' => 'required|numeric|min:0',
            ]);

            $rincian = rincian_sekolah::find($request->id);
            $rincian->jumlah_penerima = $request->jumlah;
            $rincian->save();

            return response()->json(['message' => 'Jumlah Sekolah berhasil diperbarui!']);
        }
        
        

        public function updateRincianSekolah($idmenu) {
                $sekolah = rincian_sekolah::where('id_menu_harian',$idmenu)->get();
                $menu = Menu::findOrFail($idmenu);
                $bulan_pengajuan = date('Ym', strtotime($menu->tanggal_pengajuan)); // Format YYYY-MM untuk filter
                $count = Menu::whereMonth('tanggal_pengajuan', date('m', strtotime($menu->tanggal_pengajuan)))
                ->whereYear('tanggal_pengajuan', date('Y', strtotime($menu->tanggal_pengajuan)))
                ->count();
                $nomor_pengajuan = 'PMH-' . $bulan_pengajuan . '' . str_pad($count, 3, '0', STR_PAD_LEFT);
                $menu->update([
                    'nomor_pengajuan' => $nomor_pengajuan,
                ]);
                foreach ($sekolah as $data) {
                        $update = rincian_sekolah::findOrFail($data->id);
                        $update->update([
                            'status' => 1
                        ]);
                    }
                    $totalPorsi = rincian_sekolah::where('id_menu_harian', $idmenu)->where('status', 1)->sum('jumlah_penerima');
                    
                    // input jumlah karbo
                    $karbohidrat = MenuBahan::where('menu_id', $menu->karbohidrat)->get();
                    foreach ($karbohidrat as $data) {
                        rincian_menu_harian::create([
                            'id_menu_harian' => $idmenu,
                            'id_resep' => $menu->karbohidrat,
                            'id_bahan' => $data->bahan_id,
                            'jumlah'   => $data->jumlah * $totalPorsi,

                        ]);
                    }
                    // input jumlah protein
                    $protein = MenuBahan::where('menu_id', $menu->protein)->get();
                    foreach ($protein as $data) {
                        rincian_menu_harian::create([
                            'id_menu_harian' => $idmenu,
                            'id_resep' => $menu->protein,
                            'id_bahan' => $data->bahan_id,
                            'jumlah'   => $data->jumlah * $totalPorsi,

                        ]);
                    }
                    // input jumlah sayur
                    $sayur = MenuBahan::where('menu_id', $menu->sayur)->get();
                    foreach ($sayur as $data) {
                        rincian_menu_harian::create([
                            'id_menu_harian' => $idmenu,
                            'id_resep' => $menu->sayur,
                            'id_bahan' => $data->bahan_id,
                            'jumlah'   => $data->jumlah * $totalPorsi,

                        ]);
                    }
                    // input jumlah buah
                    $buah = MenuBahan::where('menu_id', $menu->buah)->get();
                    foreach ($buah as $data) {
                        rincian_menu_harian::create([
                            'id_menu_harian' => $idmenu,
                            'id_resep' => $menu->buah,
                            'id_bahan' => $data->bahan_id,
                            'jumlah'   => $data->jumlah * $totalPorsi,

                        ]);
                    }
                    // input jumlah susu
                    $susu = MenuBahan::where('menu_id', $menu->susu)->get();
                    foreach ($susu as $data) {
                        rincian_menu_harian::create([
                            'id_menu_harian' => $idmenu,
                            'id_resep' => $menu->susu,
                            'id_bahan' => $data->bahan_id,
                            'jumlah'   => $data->jumlah * $totalPorsi,

                        ]);
                    }


            return redirect('/rincian_bahan/' . $idmenu)->with('success', 'Data Berhasil dimasukkan!');
        }


        public function rincian_bahan($idmenu)
        {
            $header = "Rincian Bahan";
            $data_menu_harian = Menu::where('id', $idmenu)->first();
            $dapur = DataDapur::first();
            $jumlah = rincian_sekolah::where('id_menu_harian', $idmenu)->sum('jumlah_penerima');
            if (request()->ajax()) {
                //$users = User::query();
                $rincian_menu_harian = rincian_menu_harian::where('id_menu_harian', $idmenu)
                ->select('id_resep', 'id_bahan', 'jumlah')
                ->get();

                //$Menu = Menu::all();
                return DataTables::of($rincian_menu_harian)
                    ->addIndexColumn() // Menambah index
                    ->addColumn('resep', function ($row) {
                        $resep = Resep::where('id', $row->id_resep)->first();
                        return $resep->nama_resep;
                    })
                    ->addColumn('bahan', function ($row) {
                        $bahan = TbMasterBahan::where('id', $row->id_bahan)->first();
                        return $bahan->bahan;
                    })
                    ->addColumn('satuan', function ($row) {
                        $bahan = TbMasterBahan::where('id', $row->id_bahan)->first();
                        $satuan = TbSatuan::where('id',$bahan->satuan_bahan)->first();
                        return $satuan->satuan;
                    })
                    ->addColumn('jumlah_bahan', function ($row) {
                        return number_format($row->jumlah, 0, ',', '.'); // Format: 1.234,56
                    })

                ->rawColumns(['resep', 'bahan','satuan','jumlah_bahan'])
                    ->make(true);
            }
            return view('office/mastermenu.index_rincian_menu', compact('header', 'data_menu_harian', 'dapur', 'jumlah', 'idmenu'));
        }

        public function template()
        {
            return view('office/mastermenu.template_pengajuan_menu');
        }

        public function pdf_pengajuan_menu($idmenu)
        {
            $data_menu_harian = Menu::where('id', $idmenu)->first();
            $dapur = DataDapur::first();
            // Render file template.blade.php tanpa data
            //$pdf = Pdf::loadView('office/mastermenu.template_pengajuan_menu');
            $rincian_menu_harian = rincian_menu_harian::where('id_menu_harian', $idmenu)->get();
            $tanggal_pengajuan = Carbon::parse($data_menu_harian->tanggal_pengajuan)->format('d-m-Y');
            $tanggal_kirim = Carbon::parse($data_menu_harian->tanggal_kirim)->format('d-m-Y');
            
            $totalPorsi = rincian_sekolah::where('id_menu_harian', $idmenu)->where('status', 1)->sum('jumlah_penerima');
            $karbohidrat = Resep::where('id',$data_menu_harian->karbohidrat)->value('nama_resep');
            $protein = Resep::where('id',$data_menu_harian->protein)->value('nama_resep');
            $sayur = Resep::where('id',$data_menu_harian->sayur)->value('nama_resep');
            $buah = Resep::where('id',$data_menu_harian->buah)->value('nama_resep');
            $susu = Resep::where('id',$data_menu_harian->susu)->value('nama_resep');
            
            $rincian_karbohidrat = DB::table('rincian_menu_harian as rmb')
            ->join('tb_menu_bahan as mbh', function ($join) {
                $join->on('rmb.id_resep', '=', 'mbh.menu_id')
                    ->on('rmb.id_bahan', '=', 'mbh.bahan_id');
            })
            ->join('tb_master_bahan as mb', 'rmb.id_bahan', '=', 'mb.id')
            ->join('tb_satuan as ts', 'mbh.id_satuan','=', 'ts.id')
            ->where('rmb.id_menu_harian', $idmenu)
            ->where('rmb.id_resep', $data_menu_harian->karbohidrat)
            ->select(
            DB::raw('@rownum := @rownum + 1 AS nomor_urut'),
                'mb.bahan',
                'mbh.jumlah as jumlah_menu_bahan',
                'rmb.jumlah as jumlah_rincian_menu_harian',
                'ts.satuan'
            )
            ->crossJoin(DB::raw('(SELECT @rownum := 0) AS r')) // Inisial
            ->get();

            $rincian_protein = DB::table('rincian_menu_harian as rmb')
            ->join('tb_menu_bahan as mbh', function ($join) {
                $join->on('rmb.id_resep', '=', 'mbh.menu_id')
                    ->on('rmb.id_bahan', '=', 'mbh.bahan_id');
            })
            ->join('tb_master_bahan as mb', 'rmb.id_bahan', '=', 'mb.id')
            ->join('tb_satuan as ts', 'mbh.id_satuan', '=', 'ts.id')
            ->where('rmb.id_menu_harian', $idmenu)
            ->where('rmb.id_resep', $data_menu_harian->protein)
            ->select(
            DB::raw('@rownum := @rownum + 1 AS nomor_urut'),
                'mb.bahan',
                'mbh.jumlah as jumlah_menu_bahan',
                'rmb.jumlah as jumlah_rincian_menu_harian',
                'ts.satuan'
            )
            ->crossJoin(DB::raw('(SELECT @rownum := 0) AS r')) // Inisial
            ->get();

            $rincian_sayur = DB::table('rincian_menu_harian as rmb')
            ->join('tb_menu_bahan as mbh', function ($join) {
                $join->on('rmb.id_resep', '=', 'mbh.menu_id')
                    ->on('rmb.id_bahan', '=', 'mbh.bahan_id');
            })
            ->join('tb_master_bahan as mb', 'rmb.id_bahan', '=', 'mb.id')
            ->join('tb_satuan as ts', 'mbh.id_satuan', '=', 'ts.id')
            ->where('rmb.id_menu_harian', $idmenu)
            ->where('rmb.id_resep', $data_menu_harian->sayur)
            ->select(
            DB::raw('@rownum := @rownum + 1 AS nomor_urut'),
                'mb.bahan',
                'mbh.jumlah as jumlah_menu_bahan',
                'rmb.jumlah as jumlah_rincian_menu_harian',
                'ts.satuan'
            )
            ->crossJoin(DB::raw('(SELECT @rownum := 0) AS r')) // Inisial
            ->get();

            $rincian_buah = DB::table('rincian_menu_harian as rmb')
            ->join('tb_menu_bahan as mbh', function ($join) {
                $join->on('rmb.id_resep', '=', 'mbh.menu_id')
                    ->on('rmb.id_bahan', '=', 'mbh.bahan_id');
            })
            ->join('tb_master_bahan as mb', 'rmb.id_bahan', '=', 'mb.id')
            ->join('tb_satuan as ts', 'mbh.id_satuan', '=', 'ts.id')
            ->where('rmb.id_menu_harian', $idmenu)
            ->where('rmb.id_resep', $data_menu_harian->buah)
            ->select(
            DB::raw('@rownum := @rownum + 1 AS nomor_urut'),
                'mb.bahan',
                'mbh.jumlah as jumlah_menu_bahan',
                'rmb.jumlah as jumlah_rincian_menu_harian',
                'ts.satuan'
            )
            ->crossJoin(DB::raw('(SELECT @rownum := 0) AS r')) // Inisial
            ->get();

            $rincian_susu = DB::table('rincian_menu_harian as rmb')
            ->join('tb_menu_bahan as mbh', function ($join) {
                $join->on('rmb.id_resep', '=', 'mbh.menu_id')
                    ->on('rmb.id_bahan', '=', 'mbh.bahan_id');
            })
            ->join('tb_master_bahan as mb', 'rmb.id_bahan', '=', 'mb.id')
            ->join('tb_satuan as ts', 'mbh.id_satuan', '=', 'ts.id')
            ->where('rmb.id_menu_harian', $idmenu)
            ->where('rmb.id_resep', $data_menu_harian->susu)
            ->select(
            DB::raw('@rownum := @rownum + 1 AS nomor_urut'),
                'mb.bahan',
                'mbh.jumlah as jumlah_menu_bahan',
                'rmb.jumlah as jumlah_rincian_menu_harian',
                'ts.satuan'
            )
            ->crossJoin(DB::raw('(SELECT @rownum := 0) AS r')) // Inisial
            ->get();


            // Unduh sebagai PDF dengan nama file "Formulir_Pengajuan_Menu_Harian.pdf"
            // Kirim data ke view PDF
            $pdf = Pdf::loadView('office/mastermenu.template_pengajuan_menu', compact(
                'data_menu_harian',
                'karbohidrat',
                'protein',
                'sayur',
                'buah',
                'susu',
                'rincian_karbohidrat',
                'rincian_protein',
                'rincian_sayur',
                'rincian_buah',
                'rincian_susu',
                'tanggal_pengajuan',
                'tanggal_kirim',
                'rincian_menu_harian',
                'dapur',
                'totalPorsi'
            ));
            return $pdf->download('Formulir_Pengajuan_Menu_Harian '. $tanggal_pengajuan.'.pdf');
        }
}
