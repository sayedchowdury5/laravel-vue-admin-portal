<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateADSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_d_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('created_date');
            $table->string('ad_ID');
            $table->string('ad_name');
            $table->string('ad_caption');
            $table->integer('client_no');
            $table->string('description');
            $table->integer('visual_identity');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('page');
            $table->double('seconds');
            $table->double('rate');
            $table->integer('number_of_week');
            $table->integer('slot');
            $table->double('cost');
            $table->double('discount');
            $table->double('tax');
            $table->double('total');
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
        Schema::dropIfExists('a_d_schedules');
    }
}
