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
Route::get('/auth/verifikasi', [PageController::class, 'verify'])->name('auth.verif');
Route::middleware(['auth'])->group(function () {
    Route::get('/log/index', [PageController::class, 'log_index']);
    Route::post('/auth/logout', [PageController::class, 'logout'])->name('auth.logout');
});
Route::middleware(['guest'])->group(function () {
    Route::resource('/auth/masuk', LoginController::class)
        ->only(['index', 'store', 'destroy']);
    Route::resource('/auth/daftar', RegisterController::class)
        ->only(['index', 'store']);
});
