<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KopiController;
use App\Http\Controllers\LahanController;
use App\Http\Controllers\PereController;
use App\Http\Controllers\Front;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/cc', function () {
    return view('cdd');
});

Route::get('/cd', function () {
    return view('cd');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/api/status', function () {
    return view('Api.status');
});


Route::get('/loginadmin', [AuthController::class, 'submit']);
Route::post('/authlogin',[AuthController::class,'auth']);
Route::get('/akses/logout',[AuthController::class,'logout']);


// dashboard dan detail admin
Route::get('/dashboard', [DashController::class, 'index']);
Route::get('/detail/admin/{user}', [DashController::class, 'detailadmin'])->name('detailadmin');
Route::get('/edit/admin/{user}', [DashController::class, 'edittadmin']);
Route::post('/simpan-admin/{user}',  [AkunController::class, 'updateadmin'])->name('simpan.admin');


// DATA AKUN
Route::get('/akun/user', [AkunController::class, 'index'])->name('admin');
Route::post('/data/akun/save', [AkunController::class, 'save']);
Route::get('/akun/edit/{user}', [AkunController::class, 'editakunuser']);
Route::post('/simpan-akun/{user}',  [AkunController::class, 'update'])->name('simpan.user');
Route::delete('/hapus-akun/{user}', [AkunController::class, 'hapusData']);


// DATA KOPI
Route::get('/data/kopi', [KopiController::class, 'index'])->name('kopi');
Route::post('/data/kopi/save', [KopiController::class, 'save']);
Route::get('/data/kopi/edit/{kode_kopi}', [KopiController::class, 'editkopii']);
Route::post('/simpan-kopi/{kode_kopi}',  [KopiController::class, 'updatee'])->name('simpan.kopi');
Route::delete('/hapus-kopi/{kode_kopi}', [KopiController::class, 'hapusData']);

// DATA LAHAN
Route::get('/data/lahan', [LahanController::class, 'index'])->name('lahan');
Route::post('/data/lahan/save', [LahanController::class, 'save']);
Route::post('/simpan-lahan/{kode_lahan}',  [LahanController::class, 'simpan'])->name('simpan.lahan');
Route::delete('/hapus-data/{kode_lahan}', [LahanController::class, 'hapusData']);
Route::get('/data/lahan/edit/{kode_lahan}', [LahanController::class, 'editlahan']);



// DATA Peremajaan
Route::get('/data/peremajaan', [PereController::class, 'index'])->name('pere');
Route::post('/data/pere/save', [PereController::class, 'save']);
Route::post('/simpan-pere/{kode_peremajaan}',  [PereController::class, 'simpan'])->name('simpan.pere');
Route::delete('/hapus-data/pere/{kode_peremajaan}', [PereController::class, 'hapusData']);
Route::get('/data/pere/edit/{kode_peremajaan}', [PereController::class, 'editpere']);

// DATA harga
Route::get('/data/harga/kopi', [HargaController::class, 'index'])->name('hargakopi');
Route::post('/data/harga/save', [HargaController::class, 'save']);
Route::post('/simpan-hargakopi/{id}',  [HargaController::class, 'simpan'])->name('simpan.hargakopi');
Route::delete('/hapus-hargakopi/{id}', [HargaController::class, 'hapusData']);
Route::get('/data/hargakopi/edit/{id}', [HargaController::class, 'editharga']);


// produk

Route::get('/produk/{kode_kopi}', [ProdukController::class, 'produk']);

Route::get('/hapussampah', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";

});

Route::get('/', function () {
    return view('welcome');
});
