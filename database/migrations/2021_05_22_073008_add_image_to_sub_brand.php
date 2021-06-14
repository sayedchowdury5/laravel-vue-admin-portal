<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToSubBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_brands', function (Blueprint $table) {
            //$table->string('GUID')->after('id');
            //$table->string('image')->after('GUID');
            //$table->string('image1')->after('image')->nullable();
            // $table->string('image2')->after('image1')->nullable();
            // $table->string('image3')->after('image2')->nullable();
            // $table->string('image4')->after('image3')->nullable();
            // $table->string('video')->after('image4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_brands', function (Blueprint $table) {
            //
        });
    }
}
