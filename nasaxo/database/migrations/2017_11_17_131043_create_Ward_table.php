<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ward', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('Description');
            $table->integer('ID_District')->unsigned();
            $table->foreign('ID_District')->references('id')->on('District')->ondelete('cascade');
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
        Schema::dropIfExists('Ward');
    }
}
