<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\Individuals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    return $request -> user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'login']);

Route::get('/individuals', function (Request $request){
    return Individuals::all();
});
