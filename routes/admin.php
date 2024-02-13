<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PincodeController;


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

Route::get('/login', [AdminController::class,'adminLogin'])->name('admin_login');


Route::get('get_pincode', [AdminController::class,'get_pincode'])->name('admin.get_pincode');
Route::get('pincode_list', [AdminController::class,'pincode_list'])->name('admin_pincode.list');



Route::get('/change_theme', [AdminController::class,'change_theme'])->name('change_theme');

Route::get('/logout', [AdminController::class,'adminlogout'])->name('admin_logout');

Route::post('attempt-login', [AdminController::class, 'attemptLogin'])->name('admin.login');



Route::group(['middleware' => ['admin']], function() {
    Route::view('track-order', 'backend.track_order')->name('track_order');
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/user_log', [AdminController::class,'user_log'])->name('admin.user_log');
    Route::get('get_user_log', [AdminController::class,'get_user_log'])->name('admin.get_user_log');

    Route::resource('branch', BranchController::class);
    Route::get('get_branch', [BranchController::class,'get_branch'])->name('admin.get_branch');

    Route::resource('booking', BookingController::class);
    Route::get('get_booking', [BookingController::class,'get_booking'])->name('admin.get_booking');


    Route::get('/pincode',[PincodeController::class,'index'])->name('admin.pincode');
    Route::post('pincode/update-status', [PincodeController::class, 'updatePincodeStatus'])->name('admin_pincode.update_status');
    Route::post('pincode/store', [PincodeController::class, 'store'])->name('admin_pincode.store');
    Route::get('pincode-edit/{id}', [PincodeController::class,'edit'])->name('admin_pincode.edit');
    Route::get('pincode-delete/{id}', [PincodeController::class,'delete'])->name('admin_pincode.delete');


    Route::resource('roles', RoleController::class);
    Route::resource('staff', StaffController::class);

});
