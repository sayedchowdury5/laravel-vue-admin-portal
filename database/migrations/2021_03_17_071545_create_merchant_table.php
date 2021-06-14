<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->id();
            $table->string('GUID');
            $table->string('MerchantGUID');
            $table->string('Image');
            $table->string('MerchantName');
            $table->string('PrimaryContact');
            $table->string('SecondaryContact');
            $table->string('Email');
            $table->string('SSMRegisterNumber');
            $table->string('BankName');
            $table->string('AccountNumber');
            $table->string('UnitNumber');
            $table->string('City');
            $table->string('State');
            $table->string('Country');
            $table->string('PostCode');
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
        Schema::dropIfExists('merchant');
    }
}
