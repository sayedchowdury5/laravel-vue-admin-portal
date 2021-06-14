<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_shops', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->integer('merchant');
            $table->integer('brand');
            $table->integer('category');
            $table->integer('floor');
            $table->integer('mall');
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
        Schema::dropIfExists('used_shops');
    }
}
