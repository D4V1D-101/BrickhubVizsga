<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('git_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
}
