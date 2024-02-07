<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VendorProductController;
use App\Http\Controllers\VendorServiceController;
use App\Http\Controllers\ServiceSubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [VendorController::class,'vendorLogin'])->name('vendor_login');
Route::get('/register', [VendorController::class,'vendorRegister'])->name('vendor_register');
Route::get('/forgot-password', [VendorController::class,'vendorForgotPassword'])->name('vendor_forgot_password');
Route::get('/reset-password', [VendorController::class,'vendorResetPassword'])->name('vendor_reset_password');
Route::get('/logout', [VendorController::class,'vendorlogout'])->name('vendor_logout');
Route::get('/checkemail', [VendorController::class,'checkemail'])->name('checkemail');
Route::post('attempt-login', [VendorController::class, 'attemptLogin'])->name('vendor.login');
Route::post('attempt-register', [VendorController::class, 'attemptRegister'])->name('vendor.register');
Route::get('/checkreferral', [HomeController::class,'checkreferral'])->name('checkreferral');



Route::group(['middleware' => ['vendor','unbanned']], function() {
    Route::get('/dashboard', function () {  return view('vendor_dashboard.dashboard'); })->name('vendor.dashboard');
});
