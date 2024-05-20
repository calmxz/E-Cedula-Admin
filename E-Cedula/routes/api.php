<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\Individuals;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    return $request -> user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'login']);

//testing if api works
//fetching individuals data 
Route::get('/individuals', function (Request $request){
    return Individuals::all();
});

//updating individuals data
Route::put('/individuals/{id}', function(Request $request, $id){
    $individual = Individuals::where(['_id' => $id])->first();
    $individual->update($request->all());
    return response()->json($individual, 200);
});

//deleting individuals data
Route::delete('/individuals/{id}', function($id){
    $individual = Individuals::where(['_id' => $id])->first();
    $individual->delete();
    return response()->json(null, 204);
});

Route::get('/individuals/{id}', function($id){
    $individual = Individuals::where(['_id' => $id] )->first();
    return response()->json($individual, 201);
});

//testing if api works
//fetching companies data 
Route::get('/companies', function (Request $request){
    return Company::all();
});

//updating Company data
Route::put('/companies/{id}', function(Request $request, $id){
    $company = Company::where(['_id' => $id])->first();
    $company->update($request->all());
    return response()->json($company, 200);
});

//deleting Company data
Route::delete('/companies/{id}', function($id){
    $company = Company::where(['_id' => $id])->first();
    $company->delete();
    return response()->json(null, 204);
});

Route::get('/companies/{id}', function($id){
    $company = Company::where(['_id' => $id] )->first();
    return response()->json($company, 201);
});