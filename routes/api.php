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

    Route::get('product_package_barcode_scan', [HomeController::class, 'product_package_barcode_scan']);

    Route::get('get_profile', [HomeController::class, 'getUserProfile']);
    Route::post('update_profile', [HomeController::class, 'updateUserProfile']);

    Route::get('get_assign_delivery', [HomeController::class, 'get_assign_delivery']);
    Route::post('assign_delivery_status_update', [HomeController::class, 'assign_delivery_status_update']);
    Route::get('get_assign_delivery_by_date', [HomeController::class, 'get_assign_delivery_by_date']);

    Route::get('get_all_status', [HomeController::class, 'get_all_status']);
    Route::get('get_all_remark_ndr', [HomeController::class, 'get_all_remark_ndr']);
    Route::get('get_all_remark_delivered', [HomeController::class, 'get_all_remark_delivered']);

});
