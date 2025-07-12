<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
