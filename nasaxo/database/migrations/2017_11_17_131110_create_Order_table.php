<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Description');
            $table->integer('ID_Promotion')->unsigned();
            $table->foreign('ID_Promotion')->references('id')->on('Promotion')->ondelete('cascade');
            $table->integer('ID_DeliveryPlace')->unsigned();
            $table->foreign('ID_DeliveryPlace')->references('id')->on('DeliveryPlace')->ondelete('cascade');
            $table->integer('ID_User')->unsigned();
            $table->foreign('ID_User')->references('id')->on('Users')->ondelete('cascade');
            $table->date('CreateDate');
            $table->date('ConfirmDate')->nullable();
            $table->boolean('IsPaied');
            $table->boolean('IsDelivered');
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
        Schema::dropIfExists('Order');
    }
}
