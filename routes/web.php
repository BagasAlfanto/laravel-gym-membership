<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('landing.index');
});

Route::middleware('guest')->group(function (){
    // Authentication routes
    Route::resource('/register', RegisterController::class)->only(['index', 'store']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('admin.dashboard')
    ->middleware([RoleMiddleware::class, 'role:admin']);

    // Checkin
    Route::get('/checkin', function () {
        return view('checkin.qrcode');
    })->name('checkin.index')
    ->middleware([RoleMiddleware::class, 'role:member']);

    // Logout route
    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
});
