<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->string('uid');
            $blueprint->string('email');
            $blueprint->string('avatar');
            $blueprint->string('name');
            $blueprint->string('provider');
            $blueprint->integer('role')->default(0);
            $blueprint->rememberToken();
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
        //
    }
}
