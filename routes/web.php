<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\LoginController;
use App\http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\http\Controllers\JpController;
use App\http\Controllers\FeeController;
use App\http\Controllers\ProgramController;
use App\http\Controllers\AfiliasiController;
use App\http\Controllers\LaporanController;


Route::get('/', function () {
    return view('login');
});

// Halaman Login dan Logout
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Halaman Register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerStore', [LoginController::class, 'registerStore'])->name('registerStore');

// Halaman Home
Route::group(['middleware' => ['auth', 'ceklevel:admin,staff,afiliasi']], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    // Route Ganti Password
    Route::get('/ganti_password', [HomeController::class, 'ganti_password']);
    Route::post('/ganti_password/aksi', [HomeController::class, 'ganti_password_aksi']);
    Route::get('/profile', [HomeController::class, 'profile']);
    Route::post('/profile/aksi', [HomeController::class, 'profile_aksi']);
    
    // Route CRUD Data Program
    Route::get('/data_program', [ProgramController::class, 'index'])->name('data_program');
    Route::POST('data_program/store', [ProgramController::class, 'store']);
    Route::POST('/data_program/{id}/update', [ProgramController::class, 'update']);
    Route::get('/data_program/{id}/destroy', [ProgramController::class, 'destroy']);
});

// Route CRUD Data User
Route::group(['middleware' => ['auth', 'ceklevel:admin,staff']], function () {
    Route::get('/user', [UserController::class, 'user'])->name('user');
    Route::POST('user/store', [UserController::class, 'store']);
    Route::POST('/user/{id}/update', [UserController::class, 'update']);
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);

    // Route CRUD Jenis Program
    Route::get('/jp', [JpController::class, 'index'])->name('jp');
    Route::POST('jp/store', [JpController::class, 'store']);
    Route::POST('/jp/{id}/update', [JpController::class, 'update']);
    Route::get('/jp/{id}/destroy', [JpController::class, 'destroy']);

    // Route CRUD Jenis Program
    Route::get('/fee', [FeeController::class, 'index'])->name('fee');
    Route::POST('fee/store', [FeeController::class, 'store']);
    Route::POST('/fee/{id}/update', [FeeController::class, 'update']);
    Route::get('/fee/{id}/destroy', [FeeController::class, 'destroy']);
    // Route Crud Data Afiliasi
    Route::get('/data_afiliasi', [AfiliasiController::class, 'index'])->name('data_afiliasi');
    Route::POST('data_afiliasi/store', [AfiliasiController::class, 'store']);
    Route::POST('/data_afiliasi/{id}/update', [AfiliasiController::class, 'update']);
    Route::get('/data_afiliasi/{id}/destroy', [AfiliasiController::class, 'destroy']);

    // Route Cetak Laporan
    Route::get('/cetak_laporan', [LaporanController::class, 'cetak_laporan'])->middleware(['auth'])->name('cetak_laporan');
    Route::get('cetak_laporan/{awal}/{akhir}', [LaporanController::class, 'cetaklaporan'])->name('cetak.laporan');
    Route::get('/laporan/{tgl_awal}/{tgl_akhir}', [LaporanController::class, 'filter'])->name('laporan');
});
