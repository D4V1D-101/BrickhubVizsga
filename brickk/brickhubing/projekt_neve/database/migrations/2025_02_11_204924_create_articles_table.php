<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('image')->nullable();
            $table->text('content');
            $table->integer('status')->default(1);
            $table->foreignId('game_id')->constrained('games');
            $table->timestamps(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
