<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posgrados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urlImagen');
            $table->unsignedBigInteger('facultad_id')->unsigned();
            $table->string('nombre',200);
            $table->mediumText('descripcion',1000);
            $table->string('titulo',100);
            $table->unsignedBigInteger('tipo_programa_id')->unsigned();
            $table->boolean('ofertado');
            $table->foreign('tipo_programa_id')->references('id')->on('tipo_programas');
            $table->foreign('facultad_id')->references('id')->on('facultades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posgrados');
    }
}
