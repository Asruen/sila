<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajuanDapurController;
use App\Http\Controllers\PengajuanPOController;

// ==================== LOGIN ================ //
Route::get('/', function () {
    return redirect('/login');
});

route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'ceklevel:pengadaan,admin,karyawan']], function () {
    route::get('/home',[HomeController::class,'index'])->name('home');
    route::get('/dashboard_ybb',[HomeController::class,'indexd'])->name('template.dashboard_ybb');
    
});


// ==================================== user ========================================== //
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
    
    Route::resource('/users_crud', \App\Http\Controllers\AdminController::class);
});

Route::get('/hasil-ompreng', function () { return view('ompreng');
});

// ==================================== user ========================================== //
Route::get('/download-mou', [HomeController::class, 'downloadPDF'])->name('mou.download');
Route::get('/download-pks', [HomeController::class, 'PDF'])->name('pks.download');
Route::get('/download-surat', [HomeController::class, 'PDFs'])->name('surat.download');
Route::get('/download-spesifikasi', [HomeController::class, 'PDFsm'])->name('spesifikasi.download');
Route::get('/download-lembar', [HomeController::class, 'PDFl'])->name('lembar.download');
Route::get('/download-barang', [HomeController::class, 'PDFb'])->name('barang.download');
Route::get('/download-barang2', [HomeController::class, 'PDFb2'])->name('barang2.download');
Route::get('/download-chiller', [HomeController::class, 'PDFc'])->name('chiller.download');
Route::get('/download-ruangan', [HomeController::class, 'PDFr'])->name('ruangan.download');
Route::get('/download-freezer', [HomeController::class, 'PDFf'])->name('freezer.download');
Route::get('/download-ompreng', [HomeController::class, 'PDFo'])->name('ompreng.download');