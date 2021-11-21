<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiplomadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplomados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('facultad_id')->unsigned();
            $table->string('nombre',200)->nullable($value=false);
            $table->unsignedTinyInteger('duracion')->unsigned();
            $table->unsignedBigInteger('tipo_duracion_id')->unsigned();
            $table->unsignedBigInteger('modalidad_id')->unsigned();
            $table->boolean('ofertado');
            $table->foreign('facultad_id')->references('id')->on('facultades');
            $table->foreign('tipo_duracion_id')->references('id')->on('tipo_duracions');
            $table->foreign('modalidad_id')->references('id')->on('modalidades');
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
        Schema::dropIfExists('diplomados');
    }
}
