<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('schedules'))
        {
            Schema::create('schedules', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('film_id')->unsigned();
                $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
                $table->bigInteger('room_id')->unsigned();
                $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
                $table->dateTime('start_time');
                $table->dateTime('end_time');
                $table->timestamps();
            }); 
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
