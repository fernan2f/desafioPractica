<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSencilloGeneroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sencillo_genero', function (Blueprint $table) {
            $table->string('nombreGenero');
            $table->foreign('nombreGenero')->references('nombre')->on('genero')->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('sencillo_genero');
    }
}
