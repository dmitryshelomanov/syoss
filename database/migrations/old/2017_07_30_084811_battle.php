<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Battle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battle', function(Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->integer('photo_id')->unsigned();
            $blueprint->foreign('photo_id')->references('id')->on('photo')->onDelete('cascade');
            $blueprint->string('week');
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
    }
}
