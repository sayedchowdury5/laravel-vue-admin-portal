<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_brand', function (Blueprint $table) {
            $table->id();
            $table->string('GUID');
            $table->string('ShopGUID');
            $table->string('ProductTitle');
            $table->string('Image1');
            $table->string('Image2');
            $table->string('Image3');
            $table->string('Image4');
            $table->string('Image5');
            $table->string('Video');
            $table->string('Height');
            $table->string('Weight');
            $table->string('Stock');
            $table->string('PricePerUnit');
            $table->string('Vocher');
            $table->string('Commision');
            $table->string('SST');
            $table->string('GST');
            $table->string('ShippingMethod');
            $table->string('Description');
            $table->string('TotalStock');
            $table->string('SoldStock');
            $table->string('RefundStock');
            $table->string('Activation');
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
        Schema::dropIfExists('sub_brand');
    }
}
