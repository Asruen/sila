<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\office\MasterBahanController;
use App\Http\Controllers\office\TbMasterMenuController;
use App\Http\Controllers\office\TbResepController;
//use App\Http\Controllers\TbSatuanController;
use App\Http\Controllers\office\TbSatuanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\kitchen\KitchenController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PackagingController;
use App\Http\Controllers\InspektoController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\GiziController;
use App\Http\Controllers\office\TbSupplierController;
use App\Http\Controllers\office\TingkatanSekolahController;
use App\Http\Controllers\office\CaraMasakController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ApiLogsController;
use App\Http\Controllers\InventoriController;
use App\Http\Controllers\TransaksiInventoriController;
use App\Http\Controllers\omprengController;
use App\Http\Controllers\PengajuanDapurController;
use App\Http\Controllers\PengajuanPOController;
use App\Http\Controllers\office\DataSekolahController;


// log penggunaan - masih belum dipake //
Route::resource('/apilogs', \App\Http\Controllers\ApiLogsController::class);
//====================================//

// ==================== dashboard management ================ //
Route::get('/dashboard', [ManagementController::class, 'index'])->name('dashboard');
Route::get('/management/kitchen', [ManagementController::class, 'indexKitchen'])->name('kitchenm.index');
Route::get('/management/supplier', [ManagementController::class, 'indexSupplier'])->name('supplier.index');

// ==================== dashboard management ================ //


// ============================== cara masak ========================= // 
Route::get('/caramasak', [CaraMasakController::class, 'index'])->name('caramasak.index');
Route::get('/caramasak/create', [CaraMasakController::class, 'create'])->name('caramasak.create');
Route::post('/caramasak', [CaraMasakController::class, 'store'])->name('caramasak.store');

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
// ==================================== user ========================================== //


// ==================================== resep ========================================== //
Route::resource('/resep', \App\Http\Controllers\office\TbResepController::class);
Route::get('/resep/delete/{id}', [TbResepController::class, 'destroy'])->name('resep.delete');
Route::get('/detailresep/{id}', [TbResepController::class, 'detailresep'])->name('detailresep.index');
Route::get('/tambah_detail_resep/{id}', [TbResepController::class, 'tambahbahan'])->name('detailresep.tambah_detail_resep');
Route::get('/edit_detail_resep/{id}', [TbResepController::class, 'editbahan'])->name('detailresep.edit_detail_resep');
Route::post('/prosestambahbahan', [TbResepController::class, 'storetambahbahan'])->name('prosestambahbahan');
Route::post('/proseseditbahan', [TbResepController::class, 'edittambahbahan'])->name('proseseditbahan');
Route::get('/prosesdeletebahan/{id}', [TbResepController::class, 'deletedetailbahan'])->name('prosesdeletebahan');
Route::get('/export-resep', [TbResepController::class, 'exportResep'])->name('export-resep');


// ==================================== pengadaan ========================================== //
Route::group(['middleware' => ['auth', 'ceklevel:pengadaan']], function () {
    Route::resource('/master_bahan', \App\Http\Controllers\office\MasterBahanController::class);
    Route::get('/master_bahan/delete/{id}', [MasterBahanController::class, 'destroy'])->name('master_bahan.delete');
    // Route::resource('/master_bahan', \App\Http\Controllers\MasterBahanController::class);
    Route::resource('/master_satuan', TbSatuanController::class);
    Route::get('/master_satuan/delete/{id}', [TbSatuanController::class, 'destroy'])->name('master_satuan.delete');
});
/*
Route::group(['middleware' => ['auth','ceklevel:admin,karyawan']], function () {
    route::post('/simpan-masuk',[PresensiController::class,'store'])->name('simpan-masuk');
    route::get('/presensi-masuk',[PresensiController::class,'index'])->name('presensi-masuk');    
    route::get('/presensi-keluar',[PresensiController::class,'keluar'])->name('presensi-keluar');   
    Route::post('ubah-presensi',[PresensiController::class,'presensipulang'])->name('ubah-presensi');
    Route::get('filter-data',[PresensiController::class,'halamanrekap'])->name('filter-data'); 
    Route::get('filter-data/{tglawal}/{tglakhir}',[PresensiController::class,'tampildatakeseluruhan'])->name('filter-data-keseluruhan'); 
});
*/

// ==================================== menu ========================================== //
Route::resource('/mastermenu', \App\Http\Controllers\office\TbMasterMenuController::class);
Route::get('/mastermenu/delete/{id}', [TbMasterMenuController::class, 'destroy'])->name('mastermenu.delete');
Route::get('/pdf_pengajuan_menu/{id}', [TbMasterMenuController::class, 'pdf_pengajuan_menu'])->name('pdf_pengajuan_menu');

//end menu

// ==================================== supplier ========================================== //
Route::resource('/mastersupplier', \App\Http\Controllers\office\TbSupplierController::class);
Route::get('/mastersupplier', [TbSupplierController::class, 'index'])->name('mastersupplier.index');
Route::get('/mastersupplier/delete/{id}', [TbSupplierController::class, 'destroy'])->name('mastersupplier.delete');
Route::get('/export-supplier', [TbSupplierController::class, 'exportSupplier'])->name('export-supplier');
Route::get('/export-supplier-pdf', [TbSupplierController::class, 'exportPdf']);
Route::get('/template', [TbSupplierController::class, 'template'])->name('mastersupplier.template');
Route::get('/download-pdf-purchase', [TbSupplierController::class, 'generatePDF'])->name('download.pdfpurchase');
// end supplier

// ==================================== tingkat sekolah ========================================== //
Route::resource('/tingkatansekolah', \App\Http\Controllers\office\TingkatanSekolahController::class);
Route::get('/tingkatansekolah', [TingkatanSekolahController::class, 'index'])->name('tingkatansekolah.index');
Route::get('/tingkatansekolah/delete/{id}', [TingkatanSekolahController::class, 'destroy'])->name('tingkatansekolah.delete');
// end tingkatan

//data sekolah
Route::resource('/datasekolah', \App\Http\Controllers\office\DataSekolahController::class);
Route::get('/export-sekolah', [DataSekolahController::class, 'exportSekolah'])->name('export-sekolah');
Route::get('/export-sekolah-pdf', [DataSekolahController::class, 'exportPdf']);
//end data sekolah

//data dapur
Route::resource('/datadapur', \App\Http\Controllers\office\DataDapurController::class);
//end data dapur

//bahan masak
Route::resource('/bahanmasak', \App\Http\Controllers\kitchen\BahanMasakController::class);
//end bahan masak

//stok gudang
Route::resource('/stokgudang', \App\Http\Controllers\warehouse\StokGudangController::class);
//end stok gudang

//menu bahan
route::resource('/menubahan', \App\Http\Controllers\MenuBahanCOntroller::class);
//end menu bahan

//kitchen
route::get('/dashboard_kitchen', [KitchenController::class, 'index'])->name('dashboard_kitchen');
// end kitchen

//Delivery blm dipake
route::get('/dashboard_delivery', [DeliveryController::class, 'index'])->name('dashboard_delivery');
// end Delivery


//packaging 
route::get('/dashboard_packaging', [PackagingController::class, 'index_dashboard'])->name('dashboard_packaging');
route::get('/packing', [PackagingController::class, 'index_packing'])->name('packing');
route::get('/riwayat_packaging', [PackagingController::class, 'index_riwayat_packaging'])->name('riwayat_packaging');
// end packaging

// inspektor blm dipake

route::get('/dashboard_inspektor', [InspektoController::class, 'index'])->name('dashboard_inspektor');
route::get('/riwayat_inspektor', [InspektoController::class, 'riwayat'])->name('riwayat_inspektor');

// end inspektor


// procurement blm dipake

route::get('/dashboard_procurement', [PengadaanController::class, 'index'])->name('dashboard_procurement');
route::get('/po_procurement', [PengadaanController::class, 'po'])->name('po_procurement');
route::get('/riwayat_procurement', [PengadaanController::class, 'riwayat'])->name('riwayat_procurement');

// end procurement


// gizi blm dipake 

route::get('/dashboard_gizi', [GiziController::class, 'index'])->name('dashboard_gizi');
route::get('/gizi_masakan', [GiziController::class, 'gizi'])->name('gizi_masakan');
route::get('/bahan_baku_gizi', [GiziController::class, 'bahan_baku'])->name('bahan_baku_gizi');
route::get('/riwayat_gizi', [GiziController::class, 'riwayat_gizi'])->name('riwayat_gizi');

// end gizi

// rincian menu harian

Route::get('/rincian_menu_harian/{idmenu}', [TbMasterMenuController::class, 'index_rincian_menu_harian']);
Route::post('/rincian_menu_harian//{idmenu}', [TbMasterMenuController::class, 'store_rincian_menu_harian']);
Route::put('/rincian_menu_harian/{idmenu}/{idrincian}', [TbMasterMenuController::class, 'update_rincian_menu_harian']);
Route::delete('/rincian_menu_harian/{idmenu}/{idrincian}', [TbMasterMenuController::class, 'destroy_rincian_menu_harian']);

// end menu harian

// rincian sekolah harian
Route::get('/rincian_sekolah_harian/{idmenu}', [TbMasterMenuController::class, 'index_rincian_sekolah_harian'])->name('rincian_sekolah_harian');
Route::post('/rincian_sekolah/update-jumlah', [TbMasterMenuController::class, 'updateJumlahSekolah'])->name('rincian_sekolah.update_jumlah');
Route::get('/update_rincian_sekolah_harian/{idmenu}', [TbMasterMenuController::class, 'updateRincianSekolah'])->name('update_rincian_sekolah_harian');
//Route::post('/update_rincian_sekolah_harian/{idmenu}', [TbMasterMenuController::class, 'updateRincianSekolah'])->name('update_rincian_sekolah_harian');

Route::get('/rincian_bahan/{idmenu}', [TbMasterMenuController::class, 'rincian_bahan'])->name('rincian_bahan');
// rincian sekolah harian

//--Inventori --//
Route::resource('/inventori', \App\Http\Controllers\InventoriController::class);
Route::get('/download-pdf', [InventoriController::class, 'downloadPDF'])->name('download.pdf');
//-- end Inventori --//

//--Transaksi Inventori --//
Route::resource('/transaksiinventori', \App\Http\Controllers\TransaksiInventoriController::class);
//-- end Transaksi Inventori --//


//-------------------ompreng-------------------------------------

Route::get('ompreng', [omprengController::class, 'v_ompreng']);
Route::get('ompreng/dt_ompreng', [omprengController::class, 'dt_ompreng']);
Route::get('ompreng/dt_rantang', [omprengController::class, 'dt_rantang']);
//------------------------end of ompreng-----------------------------

//------------------Pengajuan Dapur --------------------//
Route::resource('/pengajuandapur', \App\Http\Controllers\PengajuanDapurController::class);
Route::post('pengajuandapur/updateStatus', [PengajuanDapurController::class, 'updateStatus'])->name('pengajuandapur.updateStatus');
Route::get('/export-pengajuandapur', [PengajuanDapurController::class, 'exportPengajuanDapur']);
//------------------end pengajuan dapur----------------//

//------------------Pengajuan Menu --------------------//
Route::resource('/pengajuanmenu', \App\Http\Controllers\PengajuanMenuController::class);
//------------------end pengajuan menu----------------//

//------------------Pengajuan PO --------------------//
Route::resource('/pengajuanpo', \App\Http\Controllers\PengajuanPOController::class);
// routes/web.php
Route::post('/pengajuanpo/update-status', [PengajuanPOController::class, 'updateStatus'])->name('pengajuanpo.updateStatus');
Route::get('/export-pengajuanpo', [PengajuanPoController::class, 'exportPengajuanPO']);
//------------------end pengajuan po----------------//