<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mainpage', function (Blueprint $table) {
            $table->dropColumn('glassImg');
            $table->dropColumn('roomsImg');
            $table->dropColumn('restImg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mainpage', function (Blueprint $table) {
            $table->string("roomsImg");
            $table->string("glassImg");
            $table->string("restImg");
        });
    }
}
