<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album', function (Blueprint $table) {
            $table->id('id_album');
            $table->string('nombre');
            $table->integer('cantidad');
            $table->integer('duracion');
            $table->integer('visitas')->nullable();
            $table->date('fecha');
            $table->string('artista');
        });
        DB::statement("ALTER TABLE album ADD imagen LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album');
    }
}
