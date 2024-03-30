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
        Schema::create('booking_prduct_package_barcode_logs', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->string('branch_id');
            $table->string('booking_product_id');
            $table->string('booking_product_barcode_id');
            $table->string('user_id');
            $table->string('tracking_code');
            $table->string('source');
            $table->string('action');
            $table->string('status');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('booking_prduct_package_barcode_logs');
    }
};