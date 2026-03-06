<?php

use App\Http\Controllers\Api\DetailTranasksiController;
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
Route::post('/kategori/{id}', [KategoriController::class, 'show']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

// Menu API Routes
Route::get('/menu', [MenuController::class, 'index']);
Route::post('/menu', [MenuController::class, 'store']);
Route::post('/menu/{id}', [MenuController::class, 'show']);
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
Route::post('/transaksi/{id}', [TransaksiController::class, 'show']);
Route::put('/transaksi/{id}', [TransaksiController::class, 'update']);
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);

// TransaksiDetail API Routes
Route::get('/detail-transaksi', [DetailTranasksiController::class, 'index']);
Route::post('/detail-transaksi', [DetailTranasksiController::class, 'store']);
Route::post('/detail-transaksi/{id}', [DetailTranasksiController::class, 'show']);
Route::put('/detail-transaksi/{id}', [DetailTranasksiController::class, 'update']);
Route::delete('/detail-transaksi/{id}', [   DetailTranasksiController::class, 'destroy']);
