<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [SuratController::class, 'index'])->name('surat.index');
Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
Route::delete('/surat/{surat}', [SuratController::class, 'destroy'])->name('surat.destroy');
Route::get('/surat/unduh/{surat}', [SuratController::class, 'download'])->name('surat.download');
Route::get('/surat/{surat}/view', [SuratController::class, 'show'])->name('surat.show');
Route::get('/surat/edit/{surat}', [SuratController::class, 'edit'])->name('surat.edit');
Route::put('/surat/update/{surat}', [SuratController::class, 'update'])->name('surat.update');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/about', [AboutController::class, 'index'])->name('about');