<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Likes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function(Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->integer('user_id')->unsigned();
            $blueprint->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists("likes");
    }
}
