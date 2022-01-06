<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSencilloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sencillo', function (Blueprint $table) {
            $table->id('id_sencillo');
            $table->string('titulo');
            $table->date('fecha');
            $table->integer('reproducciones')->nullable();
            $table->integer('duracion');
            $table->string('artista');
            $table->string('genero');
            $table->foreignId('idAlbum');
            $table->foreign('idAlbum')->references('id_album')->on('album')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sencillo');
    }
}
