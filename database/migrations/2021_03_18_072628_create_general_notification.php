<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_notification', function (Blueprint $table) {
            $table->id();
            $table->string('GUID');
            $table->string('OrderGUID');
            $table->string('CustomerGUID');
            $table->string('ShopGUID');
            $table->string('PromotionUpdate');
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
        Schema::dropIfExists('general_notification');
    }
}
