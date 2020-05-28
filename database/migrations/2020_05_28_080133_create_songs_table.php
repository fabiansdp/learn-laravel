<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->integer('song_id')->references('id')->on('artists');
            $table->string('title');
            $table->string('genre');
            $table->integer('year');
            $table->timestamps();
        });

        Schema::table('songs', function (Blueprint $table) {
            $table->renameColumn('song_id', 'artist_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
