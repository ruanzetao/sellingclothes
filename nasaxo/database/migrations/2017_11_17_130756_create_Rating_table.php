<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rating', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Point');
            $table->integer('ID_Product')->unsigned();
            $table->foreign('ID_Product')->references('id')->on('Product')->onDelete('cascade');
            $table->integer('ID_Users')->unsigned();
            $table->foreign('ID_Users')->references('id')->on('Users')->onDelete('cascade');
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
        Schema::dropIfExists('Rating');
    }
}
