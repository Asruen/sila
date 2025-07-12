<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterBahanController;
use App\Http\Controllers\TbMasterResepController;
use App\Http\Controllers\TbMenuController;
use App\Http\Controllers\TbSatuanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PackagingController;
use App\Http\Controllers\InspektoController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\GiziController;
use App\Http\Controllers\TbSupplierController;
use App\Http\Controllers\TingkatanSekolahController;
use App\Http\Controllers\CaraMasakController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ApiLogsController;

Route::resource('/apilogs', \App\Http\Controllers\ApiLogsController::class);


Route::get('/dashboard', [ManagementController::class, 'index'])->name('dashboard');
Route::get('/management/kitchen', [ManagementController::class, 'indexKitchen'])->name('kitchenm.index');
Route::get('/management/supplier', [ManagementController::class, 'indexSupplier'])->name('supplier.index');


Route::get('/caramasak', [CaraMasakController::class, 'index'])->name('caramasak.index');
Route::get('/caramasak/create', [CaraMasakController::class, 'create'])->name('caramasak.create');
Route::post('/caramasak', [CaraMasakController::class, 'store'])->name('caramasak.store');








Route::get('/', function () {
    return redirect('/login');
});


route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'ceklevel:pengadaan,admin,karyawan']], function () {
    route::get('/home',[HomeController::class,'index'])->name('home');
    
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
    //route::get('/users', [AdminController::class, 'index'])->name('home');
    Route::resource('/users_crud', \App\Http\Controllers\AdminController::class);
});

//menu
Route::resource('/menu', \App\Http\Controllers\TbMenuController::class);
Route::get('/menu/delete/{id}', [TbMenuController::class, 'destroy'])->name('menu.delete');
Route::get('/detailmenu/{id}', [TbMenuController::class, 'detailmenu'])->name('detailmenu.index');
Route::get('/tambah_detail_menu/{id}', [TbMenuController::class, 'tambahbahan'])->name('detailmenu.tambah_detail_menu');
Route::get('/edit_detail_menu/{id}', [TbMenuController::class, 'editbahan'])->name('detailmenu.edit_detail_menu');
Route::post('/prosestambahbahan', [TbMenuController::class, 'storetambahbahan'])->name('prosestambahbahan');
Route::post('/proseseditbahan', [TbMenuController::class, 'edittambahbahan'])->name('proseseditbahan');
Route::get('/prosesdeletebahan/{id}', [TbMenuController::class, 'deletedetailbahan'])->name('prosesdeletebahan');

//============================
Route::group(['middleware' => ['auth', 'ceklevel:pengadaan']], function () {
    Route::resource('/master_bahan', \App\Http\Controllers\MasterBahanController::class);
    Route::get('/master_bahan/delete/{id}', [MasterBahanController::class, 'destroy'])->name('master_bahan.delete');
    // Route::resource('/master_bahan', \App\Http\Controllers\MasterBahanController::class);
    Route::resource('/master_satuan', \App\Http\Controllers\TbSatuanController::class);
    Route::get('/master_satuan/delete/{id}', [TbSatuanController::class, 'destroy'])->name('master_satuan.delete');
});

Route::group(['middleware' => ['auth','ceklevel:admin,karyawan']], function () {
    route::post('/simpan-masuk',[PresensiController::class,'store'])->name('simpan-masuk');
    route::get('/presensi-masuk',[PresensiController::class,'index'])->name('presensi-masuk');    
    route::get('/presensi-keluar',[PresensiController::class,'keluar'])->name('presensi-keluar');   
    Route::post('ubah-presensi',[PresensiController::class,'presensipulang'])->name('ubah-presensi');
    Route::get('filter-data',[PresensiController::class,'halamanrekap'])->name('filter-data'); 
    Route::get('filter-data/{tglawal}/{tglakhir}',[PresensiController::class,'tampildatakeseluruhan'])->name('filter-data-keseluruhan'); 
});


//resep

Route::resource('/masterresep', \App\Http\Controllers\TbMasterResepController::class);
Route::get('/masterresep/delete/{id}', [TbMasterResepController::class, 'destroy'])->name('masterresep.delete');

//end resep
// supplier
Route::resource('/mastersupplier', \App\Http\Controllers\TbSupplierController::class);
Route::get('/mastersupplier', [TbSupplierController::class, 'index'])->name('mastersupplier.index');
Route::get('/mastersupplier/delete/{id}', [TbSupplierController::class, 'destroy'])->name('mastersupplier.delete');
//Route::get('/mastersupplier/create', [TbSupplierController::class, 'create'])->name('mastersupplier.create');
//Route::post('/mastersupplier', [TbSupplierController::class, 'store'])->name('mastersupplier.store');
//Route::get('/mastersupplier/{id}/edit', [TbSupplierController::class, 'edit'])->name('mastersupplier.edit');
//Route::put('/mastersupplier/{id}', [TbSupplierController::class, 'update'])->name('mastersupplier.update');
//Route::delete('/mastersupplier/{id}', [TbSupplierController::class, 'destroy'])->name('mastersupplier.destroy');
// end supplier

// tingkatan sekolah
Route::resource('/tingkatansekolah', \App\Http\Controllers\TingkatanSekolahController::class);
Route::get('/tingkatansekolah', [TingkatanSekolahController::class, 'index'])->name('tingkatansekolah.index');
Route::get('/tingkatansekolah/delete/{id}', [TingkatanSekolahController::class, 'destroy'])->name('tingkatansekolah.delete');
//Route::get('/tingkatahsekolah/create', [TingkatanSekolahController::class, 'create'])->name('tingkatansekolah.create');
//Route::post('/tingkatansekolah', [TingkatanSekolahController::class, 'store'])->name('tingkatansekolah.store');
//Route::get('/tingkatansekolah/{id}/edit', [TingkatanSekolahController::class, 'edit'])->name('tingkatansekolah.edit');
//Route::put('/tingkatansekolah/{id}', [TingkatanSekolahController::class, 'update'])->name('tingkatansekolah.update');
//Route::delete('/tingkatansekolah/{id}', [TingkatanSekolahController::class, 'destroy'])->name('tingkatansekolah.destroy');
// end tingkatan

//data sekolah
Route::resource('/datasekolah', \App\Http\Controllers\DataSekolahController::class);
//end data sekolah

//data dapur
Route::resource('/datadapur', \App\Http\Controllers\DataDapurController::class);
//end data dapur

//bahan masak
Route::resource('/bahanmasak', \App\Http\Controllers\BahanMasakController::class);
//end bahan masak

//stok gudang
Route::resource('/stokgudang', \App\Http\Controllers\StokGudangController::class);
//end stok gudang

//menu bahan
route::resource('/menubahan', \App\Http\Controllers\MenuBahanCOntroller::class);
//end menu bahan

//kitchen
route::get('/dashboard_kitchen', [KitchenController::class, 'index'])->name('dashboard_kitchen');
// end kitchen

//Delivery
route::get('/dashboard_delivery', [DeliveryController::class, 'index'])->name('dashboard_delivery');
// end Delivery


//packaging
route::get('/dashboard_packaging', [PackagingController::class, 'index_dashboard'])->name('dashboard_packaging');
route::get('/packing', [PackagingController::class, 'index_packing'])->name('packing');
route::get('/riwayat_packaging', [PackagingController::class, 'index_riwayat_packaging'])->name('riwayat_packaging');
// end packaging

// inspektor

route::get('/dashboard_inspektor', [InspektoController::class, 'index'])->name('dashboard_inspektor');
route::get('/riwayat_inspektor', [InspektoController::class, 'riwayat'])->name('riwayat_inspektor');

// end inspektor


// procurement

route::get('/dashboard_procurement', [PengadaanController::class, 'index'])->name('dashboard_procurement');
route::get('/po_procurement', [PengadaanController::class, 'po'])->name('po_procurement');
route::get('/riwayat_procurement', [PengadaanController::class, 'riwayat'])->name('riwayat_procurement');

// end procurement


// gizi

route::get('/dashboard_gizi', [GiziController::class, 'index'])->name('dashboard_gizi');
route::get('/gizi_masakan', [GiziController::class, 'gizi'])->name('gizi_masakan');
route::get('/bahan_baku_gizi', [GiziController::class, 'bahan_baku'])->name('bahan_baku_gizi');
route::get('/riwayat_gizi', [GiziController::class, 'riwayat_gizi'])->name('riwayat_gizi');

// end gizi