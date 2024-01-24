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
        Schema::create('ungah_unguh_basa_game', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ungah_unguh_basa_id')->constrained('ungah_unguh_basa')->onDelete('cascade');
            $table->text('question');
            $table->text('image1');
            $table->text('image2');
            $table->text('answer1'); // for karakter one
            $table->text('answer2'); // for karakter two
            $table->text('options'); // store as json
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ungah_unguh_basa_game');
    }
};
