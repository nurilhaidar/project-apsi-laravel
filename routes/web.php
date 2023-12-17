<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\TemaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CustomerController::class, 'index']);
Route::get('pricelist', [CustomerController::class, 'pricelist']);

// User
Route::prefix('order')->group(function () {
    Route::resource('', OrderController::class)->except(['show', 'edit', 'update', 'destroy']);
    Route::get('receipt/{id}', [OrderController::class, 'receipt']);
});

// Admin
Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        // Dashboard Route
        Route::get('', [AdminController::class, 'index']);

        // Order Route
        Route::get('order', [OrderController::class, 'showAll']);
        Route::get('order/print', [OrderController::class, 'print']);
        Route::delete('order/{id}', [OrderController::class, 'destroy']);

        // Tema Route
        Route::resource('tema', TemaController::class);

        // Studio Route
        Route::resource('studio', StudioController::class);

        // Jam Route
        Route::resource('jam', JamController::class);

        Route::middleware('superadmin')->group(function () {
            Route::get('user', [AdminController::class, 'userAll']);
            Route::get('user/create', [AdminController::class, 'userCreate']);
            Route::post('user', [AdminController::class, 'userInsert']);
            Route::get('user/{id}', [AdminController::class, 'userShow']);
            Route::put('user/{id}', [AdminController::class, 'userUpdate']);
            Route::delete('user/{id}', [AdminController::class, 'userDelete']);
        });
    });
});

Auth::routes();
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
