<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        if(!Schema::hasTable('film_images'))
        {
            Schema::create('film_images', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('film_id')->unsigned();
                $table->foreign('film_id')->references('id')->on('films');
                $table->string('full')->nullable();
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
        Schema::dropIfExists('film_images');
    }
}
