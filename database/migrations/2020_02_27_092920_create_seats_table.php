<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        if(!Schema::hasTable('seats'))
        {
            Schema::create('seats', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('room_id')->unsigned();
                $table->foreign('room_id')->references('id')->on('rooms');
                $table->string('row',50);
                $table->bigInteger('seat_number')->unsigned();
                $table->string('name');
                $table->string('status')->default('normal');
                $table->decimal('price',8,2)->default(0);
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
        Schema::dropIfExists('seats');
    }
}
