<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('exe_name');
            $table->text('description');
            $table->string('image_path')->nullable();
            $table->dateTime('release_date');
            $table->string('download_link')->nullable();
            $table->string('short_desc', 30)->nullable();
            $table->foreignId('developer_id')->constrained('members');
            $table->foreignId('publisher_id')->constrained('members');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
