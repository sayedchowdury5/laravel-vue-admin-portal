<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_brands', function (Blueprint $table) {
            $table->id();
            $table->integer('category');
            $table->integer('product');
            $table->integer('brand');
            $table->string('sub_brand');
            $table->integer('merchant');
            $table->integer('shop');
            $table->integer('activation');
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
        Schema::dropIfExists('sub_brands');
    }
}
