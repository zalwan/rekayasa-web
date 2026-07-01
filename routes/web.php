<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukKerajinanController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin/produk')->name('admin.produk.')->group(function (): void {
    Route::get('/', [ProdukKerajinanController::class, 'adminIndex'])->name('index');
    Route::get('/create', [ProdukKerajinanController::class, 'create'])->name('create');
    Route::post('/', [ProdukKerajinanController::class, 'store'])->name('store');
    Route::get('/export-pdf', [ProdukKerajinanController::class, 'exportPdf'])->name('export-pdf');
    Route::get('/{produk}/edit', [ProdukKerajinanController::class, 'edit'])->name('edit');
    Route::put('/{produk}', [ProdukKerajinanController::class, 'update'])->name('update');
    Route::delete('/{produk}', [ProdukKerajinanController::class, 'destroy'])->name('destroy');
});

Route::get('/produk', [ProdukKerajinanController::class, 'publicIndex'])->name('produk.index');
Route::get('/produk/{produk}', [ProdukKerajinanController::class, 'show'])->name('produk.show');
