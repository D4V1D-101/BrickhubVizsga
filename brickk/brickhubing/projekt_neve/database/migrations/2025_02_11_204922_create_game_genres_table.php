<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameGenresTable extends Migration
{
    public function up()
    {
        Schema::create('game_genres', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained('games');
            $table->foreignId('genre_id')->constrained('genres');
            $table->primary(['game_id', 'genre_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_genres');
    }
}
