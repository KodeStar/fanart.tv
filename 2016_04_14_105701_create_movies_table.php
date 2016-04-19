<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('section_id')->default(1)->index();
            $table->string('sort_name')->nullable();
            $table->string('url');
            $table->dateTime('released')->nullable();
            $table->jsonb('details')->nullable();
            /*
            details:
            disambiguation
            translated names?
            official url
            */
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
        Schema::drop('movies');
    }
}
