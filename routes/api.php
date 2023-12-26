<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;

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






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
