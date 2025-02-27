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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (equivalent to `id` int(11) NOT NULL)
            $table->string('patient_name');
            $table->string('email');
            $table->string('phone');
            $table->date('date');
            $table->time('time');
            $table->string('doctor');
            $table->text('appointments');
            $table->enum('status', ['Pending', 'Approved', 'Attended', 'Unattended', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};
