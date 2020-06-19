<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('order_item_id');

            $table->unsignedBigInteger('order_id')->unsigned();
            $table->unsignedBigInteger('film_id')->unsigned();
            $table->unsignedBigInteger('food_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
            $table->foreign('food_id')->references('f_id')->on('foods')->onDelete('cascade');
            $table->unsignedInteger('order_item_quantity_food')->nullable();
            $table->decimal('order_item_price_food',20,6)->nullable();
            $table->unsignedInteger('order_item_quantity');
            $table->decimal('order_item_price', 20, 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
