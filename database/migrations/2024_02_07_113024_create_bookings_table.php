<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->string('added_by');
            $table->string('bill_no')->unique();
            $table->string('date');
            $table->string('edd');
            $table->string('from');
            $table->string('to');
            $table->string('consignor');
            $table->string('consignee');
            $table->string('consignor_gstin');
            $table->string('consignee_gstin');
            $table->string('booking_no')->unique();
            $table->string('value');
            $table->string('insurance');
            $table->string('b_charges');
            $table->string('other_charges');
            $table->string('tax');
            $table->string('total');
            $table->string('status');
            $table->string('payment_status');
            $table->string('description')->nullable();
            $table->string('tracking_code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
