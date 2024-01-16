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
        Schema::create('tembang_dolanan', function (Blueprint $table) {
            $table->id();
            $table->text('background')->nullable(); // image path storage
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('lyric')->nullable();
            $table->text('video')->nullable(); // link youtube
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tembang_dolanan');
    }
};
