<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContactQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_queries', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->string('name')->after('id');
            $table->string('email')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_queries', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->dropColumn('name');
            $table->dropColumn('email');
        });
    }
}
