<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_request', function (Blueprint $table) {
            $table->increments('Request_ID');
            $table->string('Request_Comment');
            $table->integer('User_ID')->unsigned();
            $table->foreign('User_ID')->references('id')->on('users');
            $table->integer('Service_Provider_ID')->unsigned();
            $table->foreign('Service_Provider_ID')->references('id')->on('users');
            $table->string('Request_Status');

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
        Schema::dropIfExists('user_request');
    }
}
