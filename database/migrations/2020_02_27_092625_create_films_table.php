<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        if(!Schema::hasTable('films'))
        {
            Schema::create('films', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('slug');
                $table->string('actor')->nullable()->comment('diễn viên');
                $table->string('producer')->nullable()->comment('nhà sản xuất');
                $table->string('duration')->comment('thời lượng');
                $table->string('author')->comment('đạo diễn');
                $table->date('date_release')->comment('ngày khởi chiếu');
                $table->string('describe')->comment('miêu tả phim')->nullable();
                $table->string('rated')->comment('Cấm trẻ em dưới 1618t');
                $table->string('country')->nullable();
                $table->string('languge')->nullable();
                $table->boolean('status')->default(1);

                $table->bigInteger('brand_id')->unsigned();
                $table->foreign('brand_id')->references('id')->on('brands');
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
        Schema::dropIfExists('films');
    }
}
