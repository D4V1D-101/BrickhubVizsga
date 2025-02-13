<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToDeveloperAndPublisherIdInGamesTable extends Migration
{
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
           
            $table->unsignedBigInteger('developer_id')->default(1)->change();
            $table->unsignedBigInteger('publisher_id')->default(1)->change();
        });
    }

    public function down()
    {
        Schema::table('games', function (Blueprint $table) {

            $table->dropColumn('developer_id');
            $table->dropColumn('publisher_id');
        });
    }
}
