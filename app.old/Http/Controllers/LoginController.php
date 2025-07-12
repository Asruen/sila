<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanlogin(){
        $header = "LOGIN APLIKASI DAPUR";
        return view('Login.Login-aplikasi',compact('header'));
    }


    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            $role = Auth::user();
            if($role->level == 'admin'){
                return redirect('/home');
            } else if ($role->level == 'pengadaan') {
                return redirect('/dashboard_procurement');
            } else if ($role->level == 'kitchen') {
                return redirect('/dashboard_kitchen');
            } else if ($role->level == 'delivery') {
                return redirect('/dashboard_delivery');
            } else if ($role->level == 'packaging') {
                return redirect('/dashboard_packaging');
            } else if ($role->level == 'inspektor') {
                return redirect('/dashboard_inspektor');
            } else if ($role->level == 'procurement') {
                return redirect('/dashboard_procurement');
            } else if ($role->level == 'gizi') {
                return redirect('/dashboard_gizi');
            } else if ($role->level == 'management') {
                return redirect('/dashboard');
            }
            
            
            
        }    
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/login');
    }

    public function registrasi(){
        return view('Login.registrasi');
    }

    public function simpanregistrasi(Request $request){
        // dd($request->all());

        User::create([
            'name' => $request->name,
            'level' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        
        return redirect('/home');

    }
}
