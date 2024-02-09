<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


 Route::post('login', [HomeController::class, 'login']);


 Route::middleware('auth:api')->group(function () {

    Route::get('home', [HomeController::class, 'home']);
    Route::get('booking_log', [HomeController::class, 'booking_log']);

    Route::get('get_booking_data', [HomeController::class, 'get_booking']);
    Route::post('booking_scan_update', [HomeController::class, 'booking_scan_update']);

});
