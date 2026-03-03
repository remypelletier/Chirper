<?php

use App\Http\Controllers\ChirpController;
use App\Http\controllers\Auth\Register;
use App\Http\controllers\Auth\Logout;
use App\Http\controllers\Auth\Login;
use Illuminate\Support\Facades\Route;


Route::get('/', [ChirpController::class, 'index']);

/**
 * CHIRPS ROUTES
 */
Route::middleware('auth')->group(function() {
    Route::post('/chirps', [ChirpController::class, 'store']);
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);
});

/**
 * REGISTER ROUTES
 */
Route::view('/register', 'auth.registrer')
    ->middleware('guest')
    ->name('register');
Route::post('/register', Register::class)
    ->middleware('guest');

/**
 * LOGIN ROUTES
 */
Route::view('/login', 'auth.login')
    ->middleware(('guest'));
Route::post('/login', Login::class)
    ->middleware('guest');

/**
 * LOGOUT ROUTES
 */
Route::post('/logout', Logout::class)
    ->middleware('auth');

/**
 * Route::resource('chirps', ChirpController::class)
 * *  ->only(['store', 'edit', 'update', 'destroy']);
 */