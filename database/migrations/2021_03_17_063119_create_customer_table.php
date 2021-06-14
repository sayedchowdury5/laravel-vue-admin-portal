<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('GUID');
            $table->string('Image');
            $table->string('FullName');
            $table->string('DOB');
            $table->string('Gender');
            $table->string('PrimaryContact');
            $table->string('SecondaryContact');
            $table->string('UserID');
            $table->string('Password');
            $table->string('Address');
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
        Schema::dropIfExists('customer');
    }
}
