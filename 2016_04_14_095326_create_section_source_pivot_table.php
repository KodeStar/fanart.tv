<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionSourcePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_source', function (Blueprint $table) {
            $table->integer('section_id')->unsigned()->index();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->integer('source_id')->unsigned()->index();
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');
            $table->string('url')->nullable();
            $table->boolean('primary')->default(0);
            $table->primary(['section_id', 'source_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('section_source');
    }
}
