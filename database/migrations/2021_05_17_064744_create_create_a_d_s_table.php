<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateADSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_a_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('ad_name');
            $table->integer('selling_identity');
            $table->string('ad_caption');
            $table->integer('ad_client');
            $table->integer('merchant');
            $table->integer('client_name');
            $table->integer('ad_duration');
            $table->integer('visual_identity');
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
        Schema::dropIfExists('create_a_d_s');
    }
}
