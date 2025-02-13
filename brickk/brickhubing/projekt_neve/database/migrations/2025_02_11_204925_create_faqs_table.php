<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('answer');
            $table->integer('status')->default(1);
            $table->timestamps(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}
