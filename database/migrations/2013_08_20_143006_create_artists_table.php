<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('artists')->insert(
            [
                'name' => 'Yes',
            ]
        );

        DB::table('artists')->insert(
            [
                'name' => 'Soft Machine',
            ]
        );

        DB::table('artists')->insert(
            [
                'name' => 'Gentle Giant',
            ]
        );

        DB::table('artists')->insert(
            [
                'name' => 'Emerson, Lake and Palmer',
            ]
        );

        DB::table('artists')->insert(
            [
                'name' => 'Caravan',
            ]
        );

        DB::table('artists')->insert(
            [
                'name' => 'Genesis',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artists');
    }
}
