<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipment_in_scan_details', function (Blueprint $table) {
            $table->id();
            $table->string('mainfest_id');
            $table->string('entry_date');
            $table->string('entry_time');
            $table->string('packet');
            $table->string('origin');
            $table->string('destination');
            $table->string('awb_no');
            $table->string('mf_no');
            $table->string('weight');
            $table->string('value');
            $table->string('eway_no');
            $table->string('enter_by');
            $table->string('forward_from');
            $table->string('forward_to');
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_in_scan_details');
    }
};
