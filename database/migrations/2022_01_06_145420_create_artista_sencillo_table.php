<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistaSencilloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista_sencillo', function (Blueprint $table) {

            $table->foreignId('idArtista');
            $table->foreign('idArtista')->references('id_artista')->on('artista')->onDelete("cascade")->onUpdate("cascade");

            $table->foreignId('idSencillo');
            $table->foreign('idSencillo')->references('id_sencillo')->on('sencillo')->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artista_sencillo');
    }
}
