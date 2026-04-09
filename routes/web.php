<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PendaftaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

# =========================
# HOME
# =========================
Route::get('/', [PesertaController::class, 'home'])->name('home');


# =========================
# JURUSAN
# =========================
Route::prefix('jurusan')->name('jurusan.')->group(function () {
    Route::get('/', [JurusanController::class, 'index'])->name('index');
    Route::get('/create', [JurusanController::class, 'create'])->name('create');
    Route::post('/', [JurusanController::class, 'store'])->name('store');
    Route::get('/{kd_jurusan}/edit', [JurusanController::class, 'edit'])->name('edit');
    Route::put('/{kd_jurusan}', [JurusanController::class, 'update'])->name('update');
    Route::delete('/{kd_jurusan}', [JurusanController::class, 'destroy'])->name('destroy');
});


# =========================
# PESERTA
# =========================
Route::prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/', [PesertaController::class, 'index'])->name('index');
    Route::get('/create', [PesertaController::class, 'create'])->name('create');
    Route::post('/', [PesertaController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PesertaController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PesertaController::class, 'update'])->name('update');
    Route::delete('/{id}', [PesertaController::class, 'destroy'])->name('destroy');
});


# =========================
# PENDAFTARAN
# =========================
Route::prefix('pendaftaran')->name('pendaftaran.')->group(function () {
    Route::get('/', [PendaftaranController::class, 'index'])->name('index');
    Route::get('/create', [PendaftaranController::class, 'create'])->name('create');
    Route::post('/', [PendaftaranController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PendaftaranController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PendaftaranController::class, 'update'])->name('update');
    Route::delete('/{id}', [PendaftaranController::class, 'destroy'])->name('destroy');
});