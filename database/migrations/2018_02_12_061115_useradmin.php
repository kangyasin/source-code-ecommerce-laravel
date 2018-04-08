<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Useradmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('useradmin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usergroups_id')->unsigned();
            $table->foreign('usergroups_id')->references('id')->on('usergroups');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('password');
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
        Schema::dropIfExists('useradmin');
    }
}
