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
        Schema::create('available_appointments', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Available date
            $table->time('time_slot'); // Time period
            $table->integer('max_slots'); // Max patients per time slot
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_appointments');
    }
};
