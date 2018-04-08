<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Logstocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('logstocks', function (Blueprint $table) {
            $table->increments('id');

            // Penjelasan Relasi dalam remark
            // varBlueprint->integer('#column name in this')->unsigned();
            $table->integer('detailproducts_id')->unsigned();
            // varBlueprint->foreign('#column name in this relation to another table')->references('#column name id another to this table')->on('#another table');
            $table->foreign('detailproducts_id')->references('id')->on('detailproducts');

            $table->integer('masuk');
            $table->integer('keluar');
            $table->date('tanggal');
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
        Schema::dropIfExists('logstocks');
    }
}
