<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('film_attributes'))
        {
            Schema::create('film_attributes', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->decimal('price',8,2)->nullable();
                $table->bigInteger('film_id')->unsigned();
                $table->foreign('film_id')->references('id')->on('films');
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
        Schema::dropIfExists('film_attributes');
    }
}
