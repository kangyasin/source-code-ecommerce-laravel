<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Groupdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('groupdetails', function (Blueprint $table) {
            $table->increments('id');

            // Penjelasan Relasi dalam remark
            // varBlueprint->integer('#column name in this')->unsigned();
            $table->integer('usergroups_id')->unsigned();
            // varBlueprint->foreign('#column name in this relation to another table')->references('#column name id another to this table')->on('#another table');
            $table->foreign('usergroups_id')->references('id')->on('usergroups');
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menu');

            $table->boolean('flag');
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
        Schema::dropIfExists('groupdetails');
        
    }
}
