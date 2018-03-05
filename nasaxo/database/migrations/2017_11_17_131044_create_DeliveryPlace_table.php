<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DeliveryPlace', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_User')->unsigned();
            $table->foreign('ID_User')->references('id')->on('Users')->onDelete('cascade');
            $table->integer('ID_Ward')->unsigned();
            $table->foreign('ID_Ward')->references('id')->on('Ward')->ondelete('cascade');
            $table->string('ReceiveName');
            $table->string('NumberPhone');
            $table->string('DeliveryPlaces');//Khac voi ten bang
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
        Schema::dropIfExists('DeliveryPlace');
    }
}
