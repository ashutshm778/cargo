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
        Schema::create('c_note_details', function (Blueprint $table) {
            $table->id();
            $table->string('c_no_id');
            $table->string('c_no');
            $table->string('assign_type')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('assign_no')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_note_details');
    }
};
