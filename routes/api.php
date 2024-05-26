<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\LahanApi;
use App\Http\Controllers\Api\AkunApi;
use App\Http\Controllers\Api\PereApi;
use App\Http\Controllers\Api\KopiApi;

// Lahan
Route::get('/lahan/tampil', [LahanApi::class, 'index']);
Route::get('/lahan/tampil/{kode_lahan}', [LahanApi::class, 'show']);
Route::get('/lahan/tampil/user/{user}', [LahanApi::class, 'showuser']);
Route::post('/lahan/tambah', [LahanApi::class, 'store']);
Route::put('/lahan/update/{kode_lahan}', [LahanApi::class, 'updatee']);
Route::delete('/lahan/hapus/{kode_lahan}', [LahanApi::class, 'destroy']);

// Akun
Route::get('/akun/tampil', [AkunApi::class, 'index']);
Route::get('/akun/tampil/{user}', [AkunApi::class, 'showuser']);
Route::get('/akun/tampil/email/{email}', [AkunApi::class, 'showemail']);
Route::post('/akun/tambah', [AkunApi::class, 'store']);
Route::put('/akun/update/{user}', [AkunApi::class, 'update']);
Route::put('/akun/update/email/{email}', [AkunApi::class, 'updatee']);
Route::delete('/akun/hapus/{user}', [AkunApi::class, 'delete']);

// Peremajaan
Route::get('/pere/tampil', [PereApi::class, 'index']);
Route::get('/pere/tampil/{kode_peremajaan}', [PereApi::class, 'show']);
Route::get('/pere/tampil/lahan/{kode_lahan}', [PereApi::class, 'showperelahan']);
Route::post('/pere/tambah', [PereApi::class, 'store']);
Route::put('/pere/update/{kode_lahan}', [PereApi::class, 'updatee']);
Route::delete('/pere/hapus/{kode_peremajaan}', [PereApi::class, 'destroy']);
// Route::delete('/pere/hapus/lahan/{kode_lahan}', [PereApi::class, 'hapuslahan']);

// Kopi
Route::get('/kopi/tampil', [KopiApi::class, 'index']);
Route::get('/kopi/tampil/pere/{kode_peremajaan}', [KopiApi::class, 'showpere']);
Route::get('/kopi/tampil/{kode_kopi}', [KopiApi::class, 'show']);
Route::post('/kopi/tambah', [KopiApi::class, 'store']);
Route::put('/kopi/update/{user}', [KopiApi::class, 'update']);
Route::put('/kopi/update/email/{email}', [KopiApi::class, 'updatee']);
Route::delete('/kopi/hapus/{kode_kopi}', [KopiApi::class, 'delete']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
