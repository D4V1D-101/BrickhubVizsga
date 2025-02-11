<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('games');
            $table->foreignId('user_id')->constrained('users');
            $table->tinyInteger('rating');
            $table->string('review_title');
            $table->text('review_text');
            $table->timestamps(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}