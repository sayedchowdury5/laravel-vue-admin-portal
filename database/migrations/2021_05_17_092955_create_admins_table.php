<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->integer('phone_no');
            $table->string('email');
            $table->string('password');
            $table->integer('dashboard');
            $table->integer('floor');
            $table->integer('merchant');
            $table->integer('product');
            $table->integer('customer');
            $table->integer('stock');
            $table->integer('voucher');
            $table->integer('advertisement');
            $table->integer('promotion');
            $table->integer('manage_admin');
            $table->integer('setting');
            $table->integer('mall');
            $table->integer('sales');
            $table->integer('transaction');
            $table->integer('reports');
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
        Schema::dropIfExists('admins');
    }
}
