<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\UserController;


Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class,'logout']);
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::get('/profile/{email}',[UserController::class, 'profile']);
    Route::get('/ubah_password/{email}',[UserController::class, 'ubah_password']);
    Route::resource('/user', UserController::class);
    Route::resource('/karyawan', KaryawanController::class);
    Route::resource('/kriteria', KriteriaController::class);


    Route::get('/cek_karyawan/{divisi}', [PenilaianController::class, 'cek_karyawan']);
    Route::post('/tambah-keranjang',[PenilaianController::class,'TambahKeranjang_penilaian']);
    Route::delete('/hapusData_keranjang/{id}',[PenilaianController::class,'hapusData_keranjang']);
   
   
    
    Route::get('/form_penilaian/{id}',[PenilaianController::class, 'form_penilaian']);
    
    Route::get('/hitung/{tanggal}',[PenilaianController::class, 'hitung_skor']);
    
    Route::resource('/penilaian', PenilaianController::class);

    Route::get('/cetak_laporan/{tanggal}', [LaporanController::class,'cetak_laporan']);
    Route::resource('/laporan', LaporanController::class);

});

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class,'login'])->name('login');
    Route::post('/autenticate', [AuthController::class,'autenticate']);
    Route::get('/register', [AuthController::class,'register']);
});
   




