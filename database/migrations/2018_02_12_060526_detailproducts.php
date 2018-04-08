<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detailproducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detailproducts', function (Blueprint $table) {
            $table->increments('id');


            // Penjelasan Relasi dalam remark
            // varBlueprint->integer('#column name in this')->unsigned();
            $table->integer('categoryproducts_id')->unsigned();
            // varBlueprint->foreign('#column name in this relation to another table')->references('#column name id another to this table')->on('#another table');
            $table->foreign('categoryproducts_id')->references('id')->on('categoryproducts');

            $table->string('namaproducts');
            $table->text('deskripsi');
            $table->boolean('publish');
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
        Schema::dropIfExists('detailproducts');
    }
}
