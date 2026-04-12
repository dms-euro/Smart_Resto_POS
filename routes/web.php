<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Kasir\DashboardController as KasirDashboardController;
use App\Http\Controllers\Kasir\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// admin
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/users', [AuthController::class, 'index'])->name('users.index');
Route::post('/users', [AuthController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [AuthController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [AuthController::class, 'destroy'])->name('users.destroy');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::get('laporan',[LaporanController::class, 'index'])->name('laporan.index');

// kasir
Route::get('/kasir/dashboard', [KasirDashboardController::class, 'index'])->name('kasir.dashboard');
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
