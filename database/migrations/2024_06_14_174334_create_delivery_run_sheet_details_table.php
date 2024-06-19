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
        Schema::create('delivery_run_sheet_details', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_run_sheet_id');
            $table->string('user_id');
            $table->string('bill_no');
            $table->string('signature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_run_sheet_details');
    }
};
