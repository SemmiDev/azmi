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
        Schema::create('tembang_dolanan_game', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tembang_dolanan_id')->constrained('tembang_dolanan')->onDelete('cascade');
            $table->text('question');
            $table->text('answer');
            $table->text('options'); // store as json
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tembang_dolanan_game');
    }
};
