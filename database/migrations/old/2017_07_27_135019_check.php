<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Check extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check', function(Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->string('link');
            $blueprint->integer('published')->default(0);
            $blueprint->integer('photo_id')->unsigned();
            $blueprint->foreign('photo_id')->references('id')->on('photo')->onDelete('cascade');
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("check");
    }
}
