<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('combos'))
        {
            Schema::create('combos', function (Blueprint $table) {
                $table->bigIncrements('cb_id');
                $table->decimal('cb_price',8,2)->default(0);
                $table->string('cb_name');
                $table->integer('cb_quantity');
                $table->string('cb_image')->nullable();
                $table->boolean('cb_status')->default(1);
                $table->bigInteger('f_id')->unsigned();
                $table->foreign('f_id')->references('f_id')->on('foods')->onDelete('cascade');
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
        Schema::dropIfExists('combos');
    }
}
