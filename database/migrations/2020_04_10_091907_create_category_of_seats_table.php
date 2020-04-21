<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryOfSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('category_of_seats'))
        {
            Schema::create('category_of_seats', function (Blueprint $table) {
                $table->bigIncrements('cos_id');
                $table->string('cos_name');
                $table->decimal('price',8,2)->default(0);
                $table->string('cos_note')->nullable();
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
        Schema::dropIfExists('category_of_seats');
    }
}
