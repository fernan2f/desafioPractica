<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistaAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista_album', function (Blueprint $table) {

            $table->string('nombreArtista');
            $table->foreign('nombreArtista')->references('nombre')->on('artista')->onDelete("cascade")->onUpdate("cascade");

            $table->foreignId('idAlbum');
            $table->foreign('idAlbum')->references('id_album')->on('album')->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artista_album');
    }
}
