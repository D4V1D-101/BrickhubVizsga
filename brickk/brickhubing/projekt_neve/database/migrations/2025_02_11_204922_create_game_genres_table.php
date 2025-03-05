<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_genres', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained();
            $table->foreignId('genre_id')->constrained();
            $table->primary(['game_id', 'genre_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_genres');
    }
};
