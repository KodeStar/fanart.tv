<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // If they are already using the sessions database,
        // just alter it to add the user_id. Otherwise,
        // create the sessions table.
        Schema::create('sessions', function ($t)
        {
            $t->string('id')->unique();
            $t->text('payload');
            $t->integer('last_activity');
            $t->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sessions');
    }
}
