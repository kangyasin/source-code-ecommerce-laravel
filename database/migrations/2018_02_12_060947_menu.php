<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Menu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('controller');
            $table->string('parent_number');
            $table->string('type');
            $table->string('menulevel');
            $table->string('icon');
            $table->string('namamenu');
            $table->boolean('publish');
            $table->string('sort');
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
        Schema::dropIfExists('menu');
    }
}
