<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\DashboardController;
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

Route::prefix('informasi-aset')->group(function () {});

Route::prefix('pengguna')->group(function () {
    Route::get('/bagian', [PenggunaController::class, 'bagian'])->name('pengguna.bagian');
    Route::get('/tambah-bagian', [PenggunaController::class, 'tambahBagian'])->name('pengguna.tambah-bagian');
    Route::post('/simpan-bagian', [PenggunaController::class, 'simpanBagian'])->name('pengguna.simpan-bagian');
    Route::delete('/hapus-bagian/{bagian}', [PenggunaController::class, 'hapusBagian'])->name('pengguna.hapus-bagian');
    Route::get('/edit-bagian/{bagian}', [PenggunaController::class, 'editBagian'])->name('pengguna.edit-bagian');
    Route::put('/update-bagian/{bagian}', [PenggunaController::class, 'updateBagian'])->name('pengguna.update-bagian');
});
