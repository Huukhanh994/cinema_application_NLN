<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('rooms'))
        {
            Schema::create('rooms', function (Blueprint $table) {
                $table->bigIncrements('room_id');
                $table->bigInteger('cluster_id')->unsigned();
                $table->foreign('cluster_id')->references('cluster_id')->on('clusters');
    
                $table->string('room_name');
                $table->integer('qty')->nullable();
                $table->text('notes')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
