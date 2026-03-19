<?php

use App\Http\Controllers\Api\DetailTransaksiController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\ReservasiController;
use App\Http\Controllers\Api\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Kategori API Routes
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

// Menu API Routes
Route::get('/menu', [MenuController::class, 'index']);
Route::post('/menu', [MenuController::class, 'store']);
Route::get('/menu/{id}', [MenuController::class, 'show']);
Route::put('/menu/{id}', [MenuController::class, 'update']);
Route::delete('/menu/{id}', [MenuController::class, 'destroy']);

// Reservasi API Routes
Route::get('/reservasi', [ReservasiController::class, 'index']);
Route::post('/reservasi', [ReservasiController::class, 'store']);
Route::post('/reservasi/{id}', [ReservasiController::class, 'show']);
Route::put('/reservasi/{id}', [ReservasiController::class, 'update']);
Route::delete('/reservasi/{id}', [ReservasiController::class, 'destroy']);

// Transaksi API Routes
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);
Route::put('/transaksi/{id}', [TransaksiController::class, 'update']);
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);

// TransaksiDetail API Routes
Route::get('/detail-transaksi', [DetailTransaksiController::class, 'index']);
Route::post('/detail-transaksi', [DetailTransaksiController::class, 'store']);
Route::get('/detail-transaksi/{id}', [DetailTransaksiController::class, 'show']);
Route::put('/detail-transaksi/{id}', [DetailTransaksiController::class, 'update']);
Route::delete('/detail-transaksi/{id}', [DetailTransaksiController::class, 'destroy']);
