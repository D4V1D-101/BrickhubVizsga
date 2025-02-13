<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image_path')->nullable();
            $table->timestamp('release_date')->nullable();
            $table->string('download_link')->nullable();
            $table->string('short_desc', 35)->nullable();
            $table->integer('status')->default(1);
            $table->foreignId('developer_id')->constrained('members');
            $table->foreignId('publisher_id')->constrained('members');
            $table->timestamps(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}
