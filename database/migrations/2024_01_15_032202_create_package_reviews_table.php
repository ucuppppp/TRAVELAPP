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
        Schema::create('package_reviews', function (Blueprint $table) {
            $table->id('ulasanId');
            $table->foreignId('userId');
            $table->foreignId('packageId');
            $table->integer('rating');
            $table->text('review');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_reviews');
    }
};
