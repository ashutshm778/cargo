<?php

use Illuminate\Support\Facades\Route;




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



Route::get('login', App\Livewire\Backend\Auth\Login::class)->name('login');




Route::group(['middleware' => ['admin']], function() {



    Route::get('dashboard', App\Livewire\Backend\Dashboard::class)->name('admin.dashboard');
    Route::get('user_log', App\Livewire\Backend\UserLog::class)->name('admin.user_log');

    Route::get('pincode', App\Livewire\Backend\Pincode\Index::class)->name('admin.pincode');


    Route::get('branch', App\Livewire\Backend\Branch\Index::class)->name('admin.branch');
    Route::get('branch/create', App\Livewire\Backend\Branch\Create::class)->name('branch.create');
    Route::get('branch/edit/{id}', App\Livewire\Backend\Branch\Edit::class)->name('branch.edit');

    Route::get('booking', App\Livewire\Backend\Booking\Index::class)->name('admin.booking');
    Route::get('booking/create', App\Livewire\Backend\Booking\Create::class)->name('booking.create');
    Route::get('booking/edit/{id}', App\Livewire\Backend\Booking\Edit::class)->name('booking.edit');
    Route::get('booking/show/{id}', App\Livewire\Backend\Booking\Show::class)->name('booking.show');
    Route::get('track_order/{id}', App\Livewire\Backend\Booking\TrackOrder::class)->name('booking.track_order');
    Route::get('payment_receipt/{id}', App\Livewire\Backend\Booking\PaymentReceipt::class)->name('booking.payment_receipt');
    Route::get('bookinglog', App\Livewire\Backend\Booking\BookingLogLivewire::class)->name('admin.booking_log');
    Route::get('delivery', App\Livewire\Backend\Booking\Delivery::class)->name('admin.delivery');
    Route::get('mainifestation', App\Livewire\Backend\Booking\Manifestation::class)->name('admin.mainifestation');
    Route::get('booking/barcode/{id}', App\Livewire\Backend\Booking\BookingBarcode::class)->name('booking.barcode');
    Route::get('assign_delivery', App\Livewire\Backend\Booking\AssignDelivery::class)->name('admin.assign_delivery');

    Route::get('consigner', App\Livewire\Backend\Consigner\Index::class)->name('admin.consigner');
    Route::get('consigner/create', App\Livewire\Backend\Consigner\Create::class)->name('admin.consigner_create');
    Route::get('consigner/edit/{id}', App\Livewire\Backend\Consigner\Edit::class)->name('admin.consigner_edit');

    Route::get('consignee', App\Livewire\Backend\Consignee\Index::class)->name('admin.consignee');
    Route::get('consignee/create', App\Livewire\Backend\Consignee\Create::class)->name('admin.consignee_create');
    Route::get('consignee/edit/{id}', App\Livewire\Backend\Consignee\Edit::class)->name('admin.consignee_edit');

    Route::get('role', App\Livewire\Backend\Role\Index::class)->name('admin.role');
    Route::get('role/create', App\Livewire\Backend\Role\Create::class)->name('admin.role_create');
    Route::get('role/edit/{id}', App\Livewire\Backend\Role\Edit::class)->name('admin.role_edit');

    Route::get('staff', App\Livewire\Backend\Staff\Index::class)->name('admin.staff');
    Route::get('staff/create', App\Livewire\Backend\Staff\Create::class)->name('admin.staff_create');
    Route::get('staff/edit/{id}', App\Livewire\Backend\Staff\Edit::class)->name('admin.staff_edit');

    Route::get('branch_report', App\Livewire\Backend\Report\BranchReport::class)->name('admin.branch_report');

    Route::get('contact_us', App\Livewire\Backend\ContactUs\Index::class)->name('admin.contact_us');
    Route::get('carrer', App\Livewire\Backend\Career\Index::class)->name('admin.carrer');
    Route::get('frenchies', App\Livewire\Backend\Frenchie\Index::class)->name('admin.frenchies');

    Route::get('c_note', App\Livewire\Backend\CNote\Index::class)->name('admin.c_note');
    Route::get('c_note/create', App\Livewire\Backend\CNote\Create::class)->name('admin.c_note_create');
    Route::get('c_note/edit/{id}', App\Livewire\Backend\CNote\Edit::class)->name('admin.c_note_edit');
    Route::get('c_note/assign/{id}', App\Livewire\Backend\CNote\Assign::class)->name('admin.c_note_assign');

});
