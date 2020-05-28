<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenameSongsColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('rename_songs_column', function (Blueprint $table) {
        //     $table->renameColumn('')
        // });

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
        Schema::dropIfExists('rename_songs_column');
    }
}
