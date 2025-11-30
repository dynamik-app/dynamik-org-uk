<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\EstimateController;
use App\Http\Controllers\Api\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::middleware('auth:sanctum')->name('api.')->group(function () {
    Route::get('/companies', [CompanyController::class, 'index']);
    Route::post('/companies', [CompanyController::class, 'store']);
    Route::post('/companies/{company}/members', [CompanyController::class, 'addMember']);
    Route::post('/companies/{company}/select', [CompanyController::class, 'select']);

    Route::apiResource('clients', ClientController::class)
        ->only(['index', 'store', 'show', 'update']);

    Route::apiResource('estimates', EstimateController::class)
        ->only(['index', 'store', 'show', 'update']);

    Route::apiResource('invoices', InvoiceController::class)
        ->only(['index', 'store', 'show', 'update']);
});
