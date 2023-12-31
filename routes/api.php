<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\claimController;
use App\Http\Controllers\GetAQuoteController;


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

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('cars', [CarController::class, 'addNewCar']);
Route::get('viewcars', [CarController::class, 'viewCars']);
Route::get('getCars/{userId}', [CarController::class, 'getCars']);


Route::post('quote', [GetAQuoteController::class, 'store']);
Route::get('getQuotes/{userId}', [GetAQuoteController::class, 'getQuotes']);

Route::post('storeClaims', [claimController::class, 'storeClaims']);
Route::get('getClaims/{userId}', [claimController::class, 'getClaims']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
