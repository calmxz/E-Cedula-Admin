<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home.dashboard');
    });
    Route::get('/dashboard', [App\Http\Controllers\PageController::class, 'dashboard'])->name('home.dashboard');
    Route::get('/individuals', [App\Http\Controllers\PageController::class, 'individuals'])->name('home.individuals');
    Route::get('/companies', [App\Http\Controllers\PageController::class, 'companies'])->name('home.company');
});

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard-data', [DashboardController::class, 'getData']);