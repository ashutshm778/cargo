<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class,'home'])->name('home');
Route::view('about-us', 'frontend.about')->name('about');
Route::get('track-order',[HomeController::class,'track_order'] )->name('track_order');
Route::view('career', 'frontend.career')->name('career');
Route::view('services', 'frontend.services')->name('services');
Route::view('service-details', 'frontend.service_details')->name('service_detail');
Route::view('contact-us', 'frontend.contact')->name('contact');
