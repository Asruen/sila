<?php

use App\Http\Controllers\PengajuanPOController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PenerimaMakanController;
use App\Http\Controllers\PenerimaBahanController;
use App\Http\Controllers\OmprengController;

Route::get('/penerimaan-bahan', [PenerimaBahanController::class, 'index']);
Route::post('/penerimaan-bahan', [PenerimaBahanController::class, 'storePenerimaBahan'])->middleware('api'); ;

Route::get('/hasil-ompreng', [OmprengController::class, 'index']);
Route::post('/hasil-ompreng', [OmprengController::class, 'store']);

Route::get('/penerima-makan-gratis', [PenerimaMakanController::class, 'index']);
Route::post('/penerima-makan-gratis', [PenerimaMakanController::class, 'storePenerimaMakan']);

Route::get('/menu-hari-ini', [MenuController::class, 'index']);
Route::post('/menu-hari-ini', [MenuController::class, 'storeMenu']);

Route::get('/pengajuanpo', [PengajuanPOController::class, 'index']); // GET semua data
Route::post('/pengajuanpo/store', [PengajuanPOController::class, 'store']); // POST tambah data
Route::post('/pengajuanpo/update-status', [PengajuanPOController::class, 'updateStatus']); // POST update status


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


