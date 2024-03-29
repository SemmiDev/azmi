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
        Schema::create('arane_kewan', function (Blueprint $table) {
            $table->id();
            $table->text('background')->nullable(); // image path storage
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('voice')->nullable(); // file/voice mp3 path storage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arane_kewan');
    }
};
