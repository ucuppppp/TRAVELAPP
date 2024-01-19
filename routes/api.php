<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TravelPackageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


    // Route::middleware(['auth:sanctum'])->group(function () {

        Route::post('/login', [AuthenticationController::class, 'login']);
    // });


    Route::get('/destinations', [DestinationController::class, 'index']);
    Route::get('/destinationsPage', [DestinationController::class, 'indexPaginate']);
    Route::get('/destination/{id}', [DestinationController::class, 'show']);
    Route::get('/travel-packages', [TravelPackageController::class, 'index']);
    Route::get('/travel-package/{id}', [TravelPackageController::class, 'show']);





