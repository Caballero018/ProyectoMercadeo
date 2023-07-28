<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication routes with email verification
Auth::routes(['verify' => true]);

// Main view for authenticated users
Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified', 'disabled']);

// Log paths
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware(['guest'])
    ->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

// Routes for email verification
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
    ->middleware(['auth'])
    ->name('login.destroy');

// Main view for Admin
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth.admin', 'disabled'])
    ->name('admin.index');

// Users view for administrator
Route::get('/users', [AdminController::class, 'usersShow'])
    ->middleware(['auth.admin', 'disabled'])
    ->name('admin.users');

// Controles for the edition of users
Route::get('/users/edit/{user}', [AdminController::class, 'userEdit'])
    ->middleware(['auth.admin', 'disabled'])
    ->name('admin.users.edit');
Route::put('/users/edit/{user}', [AdminController::class, 'edit'])
    ->middleware(['auth.admin', 'disabled'])
    ->name('admin.users.editation');

// View for disabled users
Route::get('/disabled', function () {
    return view('admin.disabled');
})->name('admin.disabled');
