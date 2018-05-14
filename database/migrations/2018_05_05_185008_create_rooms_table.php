<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('num')->default(0);
            $table->unsignedInteger('type');
            $table->float('price', 8, 2);
            $table->unsignedInteger('places');
            $table->boolean('booked')->default(0);
            $table->unsignedInteger('person_id')->nullable();
            $table->dateTime('bookedAt')->nullable();
            $table->dateTime('bookedTill')->nullable();
            $table->timestamps();

            $table->foreign('type')->references('id')->on('rooms_category')->onDelete('cascade');
            
            $table->foreign('person_id')->references('id')->on('guests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
