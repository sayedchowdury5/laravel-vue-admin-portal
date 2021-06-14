<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSecondaryAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_secondary_address', function (Blueprint $table) {
            $table->id();
            $table->string('GUID');
            $table->string('CustomerGUID');
            $table->string('Address');
            $table->string('City');
            $table->string('State');
            $table->string('Country');
            $table->string('PostCode');
            $table->string('ContactNumber');
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
        Schema::dropIfExists('customer_secondary_address');
    }
}
