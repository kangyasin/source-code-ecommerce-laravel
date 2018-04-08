<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TsHdtransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ts_hdtransaksi', function (Blueprint $table) {
            $table->increments('id');

            // Penjelasan Relasi dalam remark
            // varBlueprint->integer('#column name in this')->unsigned();
            $table->integer('customer_id')->unsigned();
            // varBlueprint->foreign('#column name in this relation to another table')->references('#column name id another to this table')->on('#another table');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->integer('totaldiskon');
            $table->boolean('statuspembelian');
            $table->date('tanggaltransaksi');
            $table->integer('totalpembelian');
            $table->integer('totalongkir');
            $table->string('noresi');
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
        Schema::dropIfExists('ts_hdtransaksi');
    }
}
