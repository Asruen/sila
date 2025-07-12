<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $header = "Dashboard";
        return view('Home',compact('header'));
    }

    public function indexd(){
        $header = "Dashboard Ybb";
        return view('template.dashboard_ybb', compact('header'));
    }
}
