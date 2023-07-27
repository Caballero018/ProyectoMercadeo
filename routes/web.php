<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Authentication routes with email verification
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified']);

// Log paths
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware(['guest'])
    ->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware('auth')
    ->name('verification.verify');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})
    ->middleware('auth')
    ->name('verification.notice');

// User authentication
Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

// Logout
Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

// Admin authentication routes
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::get('/users', [AdminController::class, 'usersShow'])
    ->middleware('auth.admin')
    ->name('admin.users');
Route::get('/users/edit/{user}', [AdminController::class, 'userEdit'])
    ->middleware('auth.admin')
    ->name('admin.users.edit');
