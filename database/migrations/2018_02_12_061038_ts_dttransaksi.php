<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TsDttransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ts_dttransaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ts_hdtransaksi_id')->unsigned();
            $table->foreign('ts_hdtransaksi_id')->references('id')->on('ts_hdtransaksi');
            $table->integer('detailproducts_id')->unsigned();
            $table->foreign('detailproducts_id')->references('id')->on('detailproducts');
            $table->integer('jumlahpembelian');
            $table->integer('harga');
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
        Schema::dropIfExists('ts_dttransaksi');
    }
}
