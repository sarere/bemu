<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThumbnailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thumbnails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ok_logo');
            $table->string('email')->nullable();
            $table->string('fb')->nullable();
            $table->string('twitter')->nullable();
            $table->string('website')->nullable();
            $table->string('line')->nullable();
            $table->integer('layouts_id')->unsigned();
            $table->foreign('layouts_id')->references('id')->on('layouts');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('thumbnails');
    }
}
