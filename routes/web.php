<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth:sanctum',])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');

    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::resource('fasilitas', App\Http\Controllers\FasilitasController::class);

    Route::resource('mapels', App\Http\Controllers\MapelController::class);

    Route::resource('jadwals', App\Http\Controllers\JadwalPelajaranlController::class);

    Route::resource('siswas', App\Http\Controllers\SiswaController::class);

    Route::resource('kelas', App\Http\Controllers\KelasController::class);

    Route::resource('nilai', App\Http\Controllers\NilaiController::class);
});

