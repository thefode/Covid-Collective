<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->string('url');
            $table->string('audience')->nullable();
            $table->string('category')->nullable();
            $table->string('cost')->nullable();
            $table->string('media')->nullable();
            $table->dateTime('createdAt');
            $table->dateTime('updatedAt')->nullable();
            $table->dateTime('deletedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resources');
    }

}
