<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TsDtpayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ts_dtpayment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ts_hdpayment_id')->unsigned();
            $table->foreign('ts_hdpayment_id')->references('id')->on('ts_hdpayment');
            $table->integer('hargabayar');
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
        //
        Schema::dropIfExists('ts_dtpayment');
    }
}
