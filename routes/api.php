<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TripController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
});

Route::middleware('auth:user')->group(function () {
    Route::get('cities', [CityController::class, 'index']);
    Route::get('trips', [TripController::class, 'index']);
    Route::post('trips/{trip}/reserve', [TripController::class, 'reserve']);
});
