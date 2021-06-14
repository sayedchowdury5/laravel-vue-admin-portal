<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderReturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_return', function (Blueprint $table) {
            $table->id();
            $table->string('GUID');
            $table->string('OrderGUID');
            $table->string('Image1');
            $table->string('Image2');
            $table->string('Image3');
            $table->string('Image4');
            $table->string('Reason');
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
        Schema::dropIfExists('order_return');
    }
}
