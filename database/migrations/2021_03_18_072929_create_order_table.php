<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('GUID');
            $table->string('CustomerGUID');
            $table->string('CustomerName');
            $table->string('Quantity');
            $table->string('Price');
            $table->string('ShippingCost');
            $table->string('DeliveryDate');
            $table->string('ShippingAddress');
            $table->string('CustomerPrimaryContact');
            $table->string('CustomerEmail');
            $table->string('OrderStatus');
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
        Schema::dropIfExists('order');
    }
}
