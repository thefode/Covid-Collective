<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('status', 100);
            $table->string('city', 100);
            $table->string('area', 100);
            $table->string('name');
            $table->string('postcode')->nullable();
            $table->point('coordinates')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
    }

}
