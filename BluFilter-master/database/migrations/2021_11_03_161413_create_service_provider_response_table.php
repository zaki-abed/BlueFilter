<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProviderResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_provider_response', function (Blueprint $table) {
            $table->increments('Response_ID');
            $table->string('Response_Comment');
            $table->integer('Service_Provider_ID')->unsigned();
            $table->foreign('Service_Provider_ID')->references('id')->on('users');

            $table->integer('User_Request_ID')->unsigned()->unique();
            $table->foreign('User_Request_ID')->references('Request_ID')->on('user_request');
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
        Schema::dropIfExists('service_provider_response');
    }
}
