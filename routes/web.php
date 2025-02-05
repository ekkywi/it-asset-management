<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\DashboardController;
use App\Http\Controllers\App\PenggunaController;
use App\Http\Controllers\App\OrganisasiController;

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

// Menu Pengguna
Route::get('/pengguna', [PenggunaController::class, 'pengguna'])->name('pengguna');


// Menu Organisasi
Route::prefix('organisasi')->group(function () {

    // Menu Bagian
    Route::get('/bagian', [OrganisasiController::class, 'bagian'])->name('organisasi.bagian');
    Route::prefix('bagian')->group(function () {
        Route::get('/tambah-bagian', [OrganisasiController::class, 'tambahBagian'])->name('organisasi.tambah-bagian');
        Route::post('/simpan-bagian', [OrganisasiController::class, 'simpanBagian'])->name('organisasi.simpan-bagian');
        Route::delete('/hapus-bagian/{bagian}', [OrganisasiController::class, 'hapusBagian'])->name('organisasi.hapus-bagian');
        Route::get('/edit-bagian/{bagian}', [OrganisasiController::class, 'editBagian'])->name('organisasi.edit-bagian');
        Route::put('/update-bagian/{bagian}', [OrganisasiController::class, 'updateBagian'])->name('organisasi.update-bagian');
    });

    // Menu Jabatan
    Route::get('/jabatan', [OrganisasiController::class, 'jabatan'])->name('organisasi.jabatan');
    Route::prefix('jabatan')->group(function () {
        Route::get('/tambah-jabatan', [OrganisasiController::class, 'tambahJabatan'])->name('organisasi.tambah-jabatan');
        Route::post('/simpan-jabatan', [OrganisasiController::class, 'simpanJabatan'])->name('organisasi.simpan-jabatan');
        Route::delete('/hapus-jabatan/{jabatan}', [OrganisasiController::class, 'hapusJabatan'])->name('organisasi.hapus-jabatan');
        Route::get('/edit-jabatan/{jabatan}', [OrganisasiController::class, 'editJabatan'])->name('organisasi.edit-jabatan');
        Route::put('/update-jabatan/{jabatan}', [OrganisasiController::class, 'updateJabatan'])->name('organisasi.update-jabatan');
    });
});
