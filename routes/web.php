<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('pages.landing');
});

Route::middleware('guest')->group(function (){
    // Authentication routes
    Route::resource('/register', RegisterController::class)->only(['index', 'store']);
    Route::resource('/login', LoginController::class)->only(['index', 'store']);

});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('admin.dashboard')
    ->middleware([RoleMiddleware::class, 'role:admin']);

    // Checkin
    Route::get('/checkin', function () {
        return view('pages.qrcode');
    })->name('checkin.index')
    ->middleware([RoleMiddleware::class, 'role:member']);

    // Logout route
    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
});
