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
            $table->string('date')->nullable() ;
            $table->string('edd')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('delivery_address')->unique();
            $table->string('consignor')->nullable();
            $table->string('consignee')->nullable();
            $table->string('consignor_gstin')->nullable();
            $table->string('consignee_gstin')->nullable();
            $table->string('booking_no')->unique();
            $table->string('value')->nullable();
            $table->string('insurance')->nullable();
            $table->string('b_charges')->nullable();
            $table->string('other_charges')->nullable();
            $table->string('tax')->nullable();
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
