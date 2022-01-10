<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumGeneroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_genero', function (Blueprint $table) {
            $table->foreignId('idGenero');
            $table->foreign('idGenero')->references('id_genero')->on('genero')->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('album_genero');
    }
}
