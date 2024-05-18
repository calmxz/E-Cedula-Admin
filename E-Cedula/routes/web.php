<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home/dashboard');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home.dashboard');
});

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');