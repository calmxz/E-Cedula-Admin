<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home.home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.home');
    Route::get('/individuals', [App\Http\Controllers\PageController::class, 'individuals'])->name('home.individuals');
    Route::get('/companies', [App\Http\Controllers\PageController::class, 'companies'])->name('home.company');
});

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');