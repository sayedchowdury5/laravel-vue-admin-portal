<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_shops', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name');
            $table->integer('merchant');
            $table->integer('brand');
            $table->integer('category');
            $table->integer('floor');
            $table->integer('mall');
            $table->string('city');
            $table->integer('selling_identity');
            $table->integer('free_shipping_min_amount');
            $table->integer('free_shipping_for_all');
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
        Schema::dropIfExists('new_shops');
    }
}
