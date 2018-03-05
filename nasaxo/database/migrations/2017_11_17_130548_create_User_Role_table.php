<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_Role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_Users')->unsigned();
            $table->foreign('ID_Users')->references('id')->on('users')->onDelete('cascade');
            $table->integer('ID_Role')->unsigned();
            $table->foreign('ID_Role')->references('id')->on('role')->onDelete('cascade');
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
        Schema::dropIfExists('User_Role');
    }
}
