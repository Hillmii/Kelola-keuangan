<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\keuanganController;

Route::get('/', [keuanganController::class, 'index'])->name('home');

Route::get('/daftar', [userController::class, 'daftar'])->name('daftar')->middleware('guest');
Route::post('/daftar', [userController::class, 'create'])->name('create')->middleware('guest');
Route::get('/login', [userController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [userController::class, 'store'])->name('store')->middleware('guest');
Route::get('/logout', [userController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('kelola')->middleware('auth')->group(function () {
    Route::get('keuangan', [KeuanganController::class, 'keuangan'])->name('keuangan');
    Route::post('keuangan/pemasukan', [KeuanganController::class, 'pemasukan'])->name('pemasukan.store');
    Route::post('keuangan/pengeluaran', [KeuanganController::class, 'pengeluaran'])->name('pengeluaran.store');
    Route::get('keuangan/{id}', [KeuanganController::class, 'delete'])->name('delete');
});
