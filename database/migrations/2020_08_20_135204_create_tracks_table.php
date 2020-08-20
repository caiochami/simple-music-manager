<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id')->unsigned()->index();
            $table->integer('genre_id')->unsigned()->nullable()->index();
            $table->string('title');
            $table->unsignedBigInteger('number')->nullable();
            $table->timestamps();

            $table->foreign('album_id')
            ->references('id')->on('albums')
            ->onDelete('cascade');

            $table->foreign('genre_id')
            ->references('id')->on('genres')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
