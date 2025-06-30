<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('landing.index');
});

// Authentication routes
Route::resource('/login', LoginController::class)->only(['index', 'store']);
Route::resource('/register', RegisterController::class)->only(['index', 'store']);

// Check-in routes
Route::get('/qrcode', function () {
    return view('checkin.qrcode');
});
