<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->index(); // in an edit prepend with denied or deleted
            $table->tinyInteger('status')->default(0)->index(); // 0 = Pending, 1 = Active, 2 - Needs replacing, 3 = Denied, 4 = Deleted, 5 = Replaced
            $table->integer('author')->index();
            $table->integer('mod')->nullable()->index();
            $table->dateTime('approve_date')->nullable();
            $table->integer('type_id');
            $table->integer('downloads')->default(0);
            $table->integer('width');
            $table->integer('height');
            $table->string('hash', 32)->unique();
            $table->integer('size');
            $table->integer('points');
            $table->boolean('explicit')->default(false);
            $table->string('old_url')->nullable()->index();
            $table->string('imageable_id')->index();
            $table->string('imageable_type')->index();

            $table->jsonb('changes');
            /*
            changes for:
            Image uploaded by ZincRider - 1st Jan 2015 at 18:00:00 UTC
            Image approved by Akovia - 2nd Jan 2015 at 10:00:00 UTC
            Image reported by RobShad - 18th July 2015 at 11:00:00 UTC
                - Reason: weird artifacts
            Image denied by Aries - 19th July 2015 at 19:00:00 UTC
                - Reason: Weird artifacts found, please fix and reupload
            Image has been replaced by link / original (depending on if this is the edit or original)
            Image has been edited by link / original (depending on if this is the edit or original)

             */
            $table->jsonb('mod_notes')->nullable();
            $table->jsonb('comments')->nullable();
            $table->jsonb('additional_data')->nullable();
            /*
            additional_data stores:
            disc (i.e. 1, 2, 3)
            disc_type (i.e. dvd, bluray)
            replaces (if this disc replaces another image)
            replaced_by (if this disc was replaced by another image)
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
        Schema::drop('images');
    }
}
