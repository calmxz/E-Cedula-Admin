<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\Individuals;
use App\Models\Company;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'login']);


//testing if api works
//fetching individuals data 
Route::get('/individuals', function (Request $request) {
    return Individuals::all();
});

//updating individuals data
Route::put('/individuals/{id}', function (Request $request, $id) {
    $individual = Individuals::where(['_id' => $id])->first();
    $individualData = $request->all();

    // Loop through the individual data
    foreach ($individualData as $key => $value) {
        // Check if the value is blank
        if ($value === null) {
            // Replace the blank value with an empty string
            $individualData[$key] = '';
        }
    }

    // Update the individual with the modified data
    $individual->update($individualData);

    return response()->json($individual, 200);
});

//deleting individuals data
Route::delete('/individuals/{id}', function ($id) {
    $individual = Individuals::where(['_id' => $id])->first();
    $individual->delete();
    return response()->json(null, 204);
});

Route::get('/individuals/{id}', function ($id) {
    $individual = Individuals::where(['_id' => $id])->first();
    return response()->json($individual, 201);
});

//testing if api works
//fetching companies data 
Route::get('/companies', function (Request $request) {
    return Company::all();
});

//updating Company data
Route::put('/companies/{id}', function (Request $request, $id) {
    $company = Company::where(['_id' => $id])->first();
    $companyData = $request->all();

    // Loop through the company data
    foreach ($companyData as $key => $value) {
        // Check if the value is blank
        if ($value === null) {
            // Replace the blank value with an empty string
            $companyData[$key] = '';
        }
    }

    // Update the company with the modified data
    $company->update($companyData);

    return response()->json($company, 200);
});

//deleting Company data
Route::delete('/companies/{id}', function ($id) {
    $company = Company::where(['_id' => $id])->first();
    $company->delete();
    return response()->json(null, 204);
});

Route::get('/companies/{id}', function ($id) {
    $company = Company::where(['_id' => $id])->first();
    return response()->json($company, 201);
});

Route::get('/dashboard-data', [DashboardController::class, 'getDashboardData']);