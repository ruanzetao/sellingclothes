<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PromotionPicture', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_Picture')->unsigned();
            $table->foreign('ID_Picture')->references('id')->on('Picture')->ondelete('cascade');
            $table->integer('ID_Promotion')->unsigned();
            $table->foreign('ID_Promotion')->references('id')->on('Promotion')->ondelete('cascade');
            $table->boolean('IsDelete');
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
        Schema::dropIfExists('PromotionPicture');
    }
}
