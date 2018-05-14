<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mainpage', function (Blueprint $table) {
            $table->text("roomsDesc")->change();
            $table->text("glassDesc")->change();
            $table->text("restDesc")->change();
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
            //
        });
    }
}
