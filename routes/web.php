<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\SusterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RekammedisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [loginController::class, 'index']);
Route::post('/loginadmin', [loginController::class, 'authenticate']);
Route::post('/logout', [loginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dokter', [DokterController::class, 'index']);
route::resource('/dokter', DokterController::Class);
Route::get('/petugas', [SusterController::class, 'index']);
route::resource('/petugas', SusterController::Class);
Route::get('/pasien', [PasienController::class, 'index']);
route::resource('/pasien', PasienController::Class);
Route::get('laporan/{id}',[PasienController::class,'laporanpasien']);
Route::get('/laporan-data-pasien',[PasienController::class,'search']);
Route::get('/laporan-pasien',[PasienController::class,'laporan']);
Route::get('/viewpdf',[PasienController::class,'viewpdf']);
Route::get('/obat', [ObatController::class, 'index']);
route::resource('/obat', ObatController::Class);
Route::get('/ruangan', [RuanganController::class, 'index']);
route::resource('/ruangan', RuanganController::Class);
Route::get('/poli', [PoliController::class, 'index']);
route::resource('/poli', PoliController::Class);
Route::get('/rekammedis', [RekammedisController::class, 'index']);
Route::get('/proses-rekammedis', [RekammedisController::class, 'proses']);
route::resource('/rekammedis', RekammedisController::Class);
Route::get('/laporan-rekammedis-perbulan',[RekammedisController::class,'search']);
Route::get('/laporan-medis-perbulan',[RekammedisController::class,'laporan']);
Route::get('/view-pdf',[RekammedisController::class,'viewpdf']);
Route::get('/laporan-rekammedis-pertahun',[RekammedisController::class,'searchpertahun']);
Route::get('/laporan-medis-pertahun',[RekammedisController::class,'laporanpertahun']);
Route::get('/view-pdf-medis',[RekammedisController::class,'viewpdfmedis']);
Route::get('/laporan-pendapatan',[RekammedisController::class,'searchperndapatan']);
Route::get('/laporan-pendapatan-perbulan',[RekammedisController::class,'laporanpendapatan']);
Route::get('/view-pdf-pendapatan',[RekammedisController::class,'viewpdfpendapatan']);
// Route::Post('/session',[PasienController::class,'setSession']);

Route::post('set-session', [PasienController::class, 'setSession'])->name('setSession');
Route::put('/rekammedis-update/{id}', [RekammedisController::class, 'rubah']);

// route memangil type obat json
Route::get('/get-obat-type/{id}', [RekammedisController::class, 'getObatType']);