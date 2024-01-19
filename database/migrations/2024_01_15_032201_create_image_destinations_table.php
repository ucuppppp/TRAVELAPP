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
        Schema::create('image_destinations', function (Blueprint $table) {
            $table->id('imageId');
            $table->foreignId('destinationId');
            $table->string('fileName')->unique();
            $table->string('filePath');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_destinations');
    }
};
