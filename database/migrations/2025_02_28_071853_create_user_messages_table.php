<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); // Sender
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade'); // Receiver
            $table->text('message'); // Message Content
            $table->enum('status', ['sent', 'received'])->default('received');
            $table->text('subject');
            $table->timestamp('read_at')->nullable(); // Read timestamp
            $table->timestamps(); // Created_at and Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_messages');
    }
};
