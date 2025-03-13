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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained()->onDelete('cascade'); // Links to the appointments table
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to users table
            $table->tinyInteger('rating')->unsigned(); // 1 to 5 rating
            $table->text('review'); // User review
            $table->text('service');
            $table->string('sentiment')->nullable(); // Sentiment analysis result (e.g., 'positive', 'neutral', 'negative')
            $table->decimal('probability', 5, 2)->nullable(); // Probability score for sentiment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
