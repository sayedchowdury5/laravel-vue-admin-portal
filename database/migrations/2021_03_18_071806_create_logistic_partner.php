<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogisticPartner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistic_partner', function (Blueprint $table) {
            $table->id();
            $table->string('GUID');
            $table->string('SubBrandGUID');
            $table->string('LogisticPartnarName');
            $table->string('ContactNumber');
            $table->string('Email');
            $table->string('Address');
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
        Schema::dropIfExists('logistic_partner');
    }
}
