<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsersPicture', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_Users')->unsigned();
            $table->foreign('ID_Users')->references('id')->on('Users')->ondelete('cascade');
            $table->integer('ID_Picture')->unsigned();
            $table->foreign('ID_Picture')->references('id')->on('Picture')->ondelete('cascade');
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
        Schema::dropIfExists('UsersPicture');
    }
}
