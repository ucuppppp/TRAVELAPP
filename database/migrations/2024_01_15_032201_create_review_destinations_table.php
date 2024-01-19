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
        Schema::create('review_destinations', function (Blueprint $table) {
            $table->id('reviewId');
            $table->foreignId('userId');
            $table->foreignId('destinationId');
            $table->integer('rating');
            $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_destinations');
    }
};
