<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\App\DashboardController;
use App\Http\Controllers\App\ModelController;
use App\Http\Controllers\App\MerkController;
use App\Http\Controllers\App\UserController;
use App\Http\Controllers\App\SectionController;
use App\Http\Controllers\App\PositionController;
use App\Http\Controllers\App\RoleController;

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

// Landing Page
Route::get('/', [DashboardController::class, 'landing'])->name('landing-page')->middleware('auth');


// Auth
Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login-page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Menu Merk
Route::get('/merk', [MerkController::class, 'merk'])->name('merk')->middleware('auth');

// Menu Model
Route::get('/model', [ModelController::class, 'model'])->name('model')->middleware('auth');

// Menu Pengaturan Pengguna
Route::prefix('pengguna')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('/tambah-pengguna', [UserController::class, 'create'])->name('user.create');
    Route::post('/simpan-pengguna', [UserController::class, 'store'])->name('user.store');
    Route::delete('/hapus/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('user.update');
});

// Menu Pengaturan Bagian
Route::prefix('bagian')->middleware('auth')->group(function () {
    Route::get('/', [SectionController::class, 'index'])->name('section');
    Route::get('/tambah-bagian', [SectionController::class, 'create'])->name('section.create');
    Route::post('/simpan-bagian', [SectionController::class, 'store'])->name('section.store');
    Route::get('/edit/{section}', [SectionController::class, 'edit'])->name('section.edit');
    Route::put('/update/{section}', [SectionController::class, 'update'])->name('section.update');
    Route::delete('/hapus/{section}', [SectionController::class, 'destroy'])->name('section.destroy');
});

// Menu Pengaturan Jabatan
Route::prefix('jabatan')->middleware('auth')->group(function () {
    Route::get('/', [PositionController::class, 'index'])->name('position');
    Route::get('/tambah-jabatan', [PositionController::class, 'create'])->name('position.create');
    Route::post('/simpan-jabatan', [PositionController::class, 'store'])->name('position.store');
    Route::get('/edit/{position}', [PositionController::class, 'edit'])->name('position.edit');
    Route::put('/update/{position}', [PositionController::class, 'update'])->name('position.update');
    Route::delete('/hapus/{position}', [PositionController::class, 'destroy'])->name('position.destroy');
});

// Menu Pengaturan Peran
Route::prefix('peran')->middleware('auth')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('role');
    Route::get('/tambah-peran', [RoleController::class, 'create'])->name('role.create');
    Route::post('/simpan-peran', [RoleController::class, 'store'])->name('role.store');
    Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/update/{role}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/hapus/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
});
