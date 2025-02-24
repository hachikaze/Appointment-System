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
        Schema::create('audit_trail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // User ID (can be null for system actions like login/logouts)
            $table->string('action'); // The action performed
            $table->string('model')->nullable(); // The model affected (e.g., User, Product) – optional for login/logout
            $table->json('changes')->nullable(); // Store changes for update actions
            $table->string('ip_address')->nullable(); // User's IP address
            $table->text('user_agent')->nullable(); // User's browser user agent
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_trail');
    }
};
