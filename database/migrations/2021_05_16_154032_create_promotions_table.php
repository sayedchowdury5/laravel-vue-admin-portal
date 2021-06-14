<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('promotion_title');
            $table->string('description');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('url');
            $table->integer('merchant');
            $table->integer('shop');
            $table->integer('mall');
            $table->integer('brand');
            $table->integer('sub_brand');
            $table->string('promotion_by');
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
        Schema::dropIfExists('promotions');
    }
}
