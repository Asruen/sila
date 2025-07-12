<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use DataTables;
use App\Models\tbOmprengTransaksi;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class PackagingController extends Controller
{
    //
    public function index_dashboard()
    {
        $header = "Dashboard Packaging";
        return view('packaging.index_dashboard', compact('header'));
    }
    
    public function index_packing()
    {
        $header = "Dashboard Packaging";
        return view('packaging.index_packing', compact('header'));
    }

    public function index_riwayat_packaging()
    {
        $header = "Dashboard Packaging";
        return view('packaging.index_riwayat_packaging', compact('header'));
    }
//--------------------------------------------------------------------------------
    public function v_formPacking()
    {
        
        $header = "form Packing";
        //$menu = Menu::where('tanggal_kirim', date('Y-m-d'))->get() ?? 0;
        
        return view('packaging.formPacking', compact('header'/*, 'menu'*/));
    }

    public function dt_formPacking(Request $request)
    {
        $table = tbOmprengTransaksi::select('kode_rantang', tbOmprengTransaksi::raw('COUNT(kode_ompreng) as jumlah_ompreng'))
            ->where('tb_menu_id', $request->menu_id)
            ->groupBy('kode_rantang')
            ->get();
        return DataTables::of($table)
            ->addIndexColumn()
            ->addColumn('action', function ($table) {
                return '<a href="#" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    private function hitungRantang($kode_ompreng, $tb_menu_id)
    {
        $jumlah_ompreng = tbOmprengTransaksi::where('kode_rantang', $kode_ompreng)
                ->where('tb_menu_id', $tb_menu_id)
                ->count();
        $total_ompreng = tbOmprengTransaksi::where('tb_menu_id', $tb_menu_id)
        ->count();
        return [
            'jumlah_ompreng' => $jumlah_ompreng,
            'total_ompreng' => $total_ompreng
        ];
    }

    public function ajax_scanQR(Request $request)
    {
        //return $request;
        $kodeQR = $request->kodeQR;
        //return $kodeQR;
        if (strpos($kodeQR, 'RT_') === 0) {
            $jumlah_ompreng = $this->hitungRantang($kodeQR, $request->tb_menu_id);
            return response()->json([
                'success' => true,
                'jenis' => 'RT',
                'jumlah_ompreng' => $jumlah_ompreng['jumlah_ompreng'],
                'total_ompreng' => $jumlah_ompreng['total_ompreng'],
                'kode_rantang' => $kodeQR,
                'type' => 'success',
                'message' => 'Rantang '.$kodeQR.' berhasil discan'
            ]);
        } elseif (strpos($kodeQR, 'OP_') === 0) {
            $kode_rantang = $request->kode_rantang;
            $kode_ompreng = $request->kodeQR;
            $tb_menu_id = $request->tb_menu_id;
            $user_id = Auth::user()->id;
            //return $request;
            $jumlah_ompreng = $this->hitungRantang($kode_rantang, $tb_menu_id);
            if($jumlah_ompreng['jumlah_ompreng'] >= 10){
                return response()->json([
                    'success' => false,
                    'message' => 'Rantang sudah penuh',
                    'jenis' => 'RT',
                    'jumlah_ompreng' => $jumlah_ompreng['jumlah_ompreng'],
                    'total_ompreng' => $jumlah_ompreng['total_ompreng'],
                    'kode_rantang' => $kodeQR,
                    'type' => 'warning'
                ]);
            }
            $existingOmpreng = tbOmprengTransaksi::where('kode_ompreng', $kode_ompreng)->first();
            if ($existingOmpreng) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ompreng sudah diinput',
                    'type' => 'error'
                ]);
            }

            tbOmprengTransaksi::create([
                'kode_ompreng' => $kode_ompreng,
                'kode_rantang' => $kode_rantang,
                'tb_menu_id' => $tb_menu_id,
                'user_id' => $user_id
            ]);
            
                return response()->json([
                    'success' => true,
                    'jenis' => 'RT',
                    'jumlah_ompreng' => $jumlah_ompreng['jumlah_ompreng']+1,
                    'total_ompreng' => $jumlah_ompreng['total_ompreng']+1,
                    'kode_rantang' => $kode_rantang,
                    'type' => 'success',
                    'message' => 'Ompreng '.$kode_ompreng.' berhasil discan'
                ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid QR code format',
                'type'  => 'error'
            ]);
        }
    }
}
