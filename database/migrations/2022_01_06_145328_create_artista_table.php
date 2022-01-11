<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista', function (Blueprint $table) {
            $table->id('id_artista');
            $table->string('nombre')->unique();
            $table->date('fecha_nac');
            $table->string('descripcion');
            $table->integer('oyentes')->nullable();
            $table->integer('seguidores')->nullable();
        });
        DB::statement("ALTER TABLE artista ADD imagen LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artista');
    }
}
