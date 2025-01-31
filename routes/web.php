<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\DashboardController;
use App\Http\Controllers\App\InformasiAsetController;
use App\Http\Controllers\App\PenggunaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::prefix('informasi-aset')->group(function () {
    Route::get('/kategori-aset', [InformasiAsetController::class, 'kategoriAset'])->name('kategori-aset');
    Route::get('/merek-aset', [InformasiAsetController::class, 'merekAset'])->name('merek-aset');
    Route::get('/model-aset', [InformasiAsetController::class, 'modelAset'])->name('model-aset');
    Route::get('/supplier-aset', [InformasiAsetController::class, 'supplierAset'])->name('supplier-aset');
});

Route::prefix('pengguna')->group(function () {
    Route::get('/daftar-pengguna', [PenggunaController::class, 'daftarPengguna'])->name('daftar-pengguna');
});
