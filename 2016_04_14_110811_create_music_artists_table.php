<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('section_id')->default(2)->index();
            $table->string('sort_name');
            $table->string('url');
            $table->dateTime('released');
            $table->jsonb('details');
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
        Schema::drop('music_artists');
    }
}
