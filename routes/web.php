<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

// Halaman Login
Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login-page');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Halaman Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Menu Pengguna
Route::get('/pengguna', [PenggunaController::class, 'pengguna'])->name('pengguna');
Route::prefix('pengguna')->group(function () {
    Route::get('/tambah-pengguna', [PenggunaController::class, 'tambahPengguna'])->name('pengguna.tambah-pengguna');
    Route::post('/simpan-pengguna', [PenggunaController::class, 'simpanPengguna'])->name('pengguna.simpan-pengguna');
    Route::delete('/hapus-pengguna/{pengguna}', [PenggunaController::class, 'hapusPengguna'])->name('pengguna.hapus-pengguna');
    Route::get('/edit-pengguna/{pengguna}', [PenggunaController::class, 'editPengguna'])->name('pengguna.edit-pengguna');
    Route::put('/update-pengguna/{pengguna}', [PenggunaController::class, 'updatePengguna'])->name('pengguna.update-pengguna');
});

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

    // Menu Peran
    Route::get('/peran', [OrganisasiController::class, 'peran'])->name('organisasi.peran');
    Route::prefix('peran')->group(function () {
        Route::get('/tambah-peran', [OrganisasiController::class, 'tambahPeran'])->name('organisasi.tambah-peran');
        Route::post('/simpan-peran', [OrganisasiController::class, 'simpanPeran'])->name('organisasi.simpan-peran');
        Route::delete('/hapus-peran/{peran}', [OrganisasiController::class, 'hapusPeran'])->name('organisasi.hapus-peran');
        Route::get('/edit-peran/{peran}', [OrganisasiController::class, 'editPeran'])->name('organisasi.edit-peran');
        Route::put('/update-peran/{peran}', [OrganisasiController::class, 'updatePeran'])->name('organisasi.update-peran');
    });
});
