<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [PageController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::middleware(['u.verif'])->group(function () {
        Route::get('/log/dashboard', [PageController::class, 'log_index'])->name('dashboard');
        Route::post('/auth/logout', [PageController::class, 'logout'])->name('auth.logout');
    });
    Route::get('/auth/verifikasi', [PageController::class, 'verify'])->name('auth.verif');
});
Route::middleware(['guest'])->group(function () {
    Route::resource('/auth/masuk', LoginController::class)
        ->only(['index', 'store', 'destroy']);
    Route::resource('/auth/daftar', RegisterController::class)
        ->only(['index', 'store']);
});
