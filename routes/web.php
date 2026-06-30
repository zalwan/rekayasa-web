<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukKerajinanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdukKerajinanController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/produk', [ProdukKerajinanController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukKerajinanController::class, 'create'])->middleware('auth')->name('produk.create');
Route::post('/produk', [ProdukKerajinanController::class, 'store'])->middleware('auth')->name('produk.store');
Route::get('/produk/{produk}', [ProdukKerajinanController::class, 'show'])->name('produk.show');
Route::get('/produk/{produk}/edit', [ProdukKerajinanController::class, 'edit'])->middleware('auth')->name('produk.edit');
Route::put('/produk/{produk}', [ProdukKerajinanController::class, 'update'])->middleware('auth')->name('produk.update');
Route::delete('/produk/{produk}', [ProdukKerajinanController::class, 'destroy'])->middleware('auth')->name('produk.destroy');
