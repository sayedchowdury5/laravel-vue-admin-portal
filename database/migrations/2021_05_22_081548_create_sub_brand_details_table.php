<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBrandDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_brand_details', function (Blueprint $table) {
            $table->id();
            $table->string('GUID');
            $table->string('image');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('video')->nullable();
            $table->integer('sub_brand_name');
            $table->integer('brand_name');
            $table->string('product_type');
            $table->integer('shop_name');
            $table->integer('merchant');
            $table->string('mall');
            $table->integer('stock');
            $table->double('commission');
            $table->double('sst');
            $table->double('gst');
            $table->double('price');
            $table->double('discount_price');
            $table->string('description');
            $table->double('uom');
            $table->double('height');
            $table->double('weight');
            $table->string('fragile');
            $table->string('shipping');
            $table->integer('activation');
            $table->integer('admin_approval');
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
        Schema::dropIfExists('sub_brand_details');
    }
}
