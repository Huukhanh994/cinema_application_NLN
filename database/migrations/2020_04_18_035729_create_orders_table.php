<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number')->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('order_status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
            $table->decimal('order_grand_total', 20, 6);
            $table->unsignedInteger('order_item_count');
            $table->boolean('order_payment_status')->default(1);
            $table->string('order_payment_method')->nullable();
            $table->string('order_first_name');
            $table->string('order_last_name');
            $table->string('order_email');
            $table->text('order_address');
            $table->string('order_city');
            $table->string('order_country');
            $table->string('order_post_code');
            $table->string('order_phone_number');
            $table->text('order_notes')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
