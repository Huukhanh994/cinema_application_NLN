<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('foods'))
        {
            Schema::create('foods', function (Blueprint $table) {
                $table->bigIncrements('f_id');
                $table->string('f_name');
                $table->string('f_image');
                $table->decimal('f_price',8,2)->default(0);
                $table->integer('f_quantity');
                $table->boolean('f_status')->default(1);
                $table->bigInteger('coff_id')->unsigned();
                $table->foreign('coff_id')->references('cof_id')->on('category_foods')->onDelete('cascade');

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
        Schema::dropIfExists('foods');
    }
}
