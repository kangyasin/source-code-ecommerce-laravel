<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TsHdpayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ts_hdpayment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ts_hdtransaksi_id')->unsigned();
            $table->foreign('ts_hdtransaksi_id')->references('id')->on('ts_hdtransaksi');
            $table->integer('statuspayment');
            $table->integer('totalpayment');
            $table->integer('totaldiskon');
            $table->date('tanggalpayment');
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
        Schema::dropIfExists('ts_hdpayment');
    }
}
