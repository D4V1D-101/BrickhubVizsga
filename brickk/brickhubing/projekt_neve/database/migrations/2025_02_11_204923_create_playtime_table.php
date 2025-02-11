<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaytimeTable extends Migration
{
    public function up()
    {
        Schema::create('playtime', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('game_id')->constrained('games');
            $table->integer('playtime_minutes')->default(0);
 $table->timestamp('last_played')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('playtime');
    }
}
