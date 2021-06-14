<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_title');
            $table->integer('mall');
            $table->integer('merchant');
            $table->integer('shop');
            $table->integer('sub_brand');
            $table->string('voucher_code');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('min_spend');
            $table->integer('discount_amount');
            $table->integer('maximum_usage');
            $table->string('voucher_belongs_to');
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
        Schema::dropIfExists('vouchers');
    }
}
