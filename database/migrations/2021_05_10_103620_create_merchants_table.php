<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_name');
            $table->integer('ssm_no');
            $table->integer('primary_contact_no');
            $table->integer('secondary_contact_no');
            $table->string('email');
            $table->string('address');
            $table->integer('zip_code');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('bank_name');
            $table->string('bank_acc_no');
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
        Schema::dropIfExists('merchants');
    }
}
