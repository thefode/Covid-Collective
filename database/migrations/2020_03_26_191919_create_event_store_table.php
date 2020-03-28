<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventStoreTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventStore', function (Blueprint $table) {
            $table->increments('id');
            $table->string('streamId', 100);
            $table->integer('streamVersion');
            $table->string('eventName');
            $table->text('eventData');
            $table->text('metaData');
            $table->dateTime('storedAt');
            $table->unique(['streamId', 'streamVersion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eventStore');
    }

}
