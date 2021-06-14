<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateADClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_d_clients', function (Blueprint $table) {
            $table->id();
            $table->integer('ad_client');
            $table->integer('merchant');
            $table->string('client_name');
            $table->integer('selling_identity');
            $table->string('reference_no');
            $table->integer('contact_number');
            $table->string('contact_person');
            $table->string('email');
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
        Schema::dropIfExists('a_d_clients');
    }
}
