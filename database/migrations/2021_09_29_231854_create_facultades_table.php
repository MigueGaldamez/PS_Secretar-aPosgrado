<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facultades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urlImagen');
            $table->string('nombre',60);
            $table->tinyText('contactoDiplomado',150);
            $table->tinyText('contactoPosgrado',150);
            $table->char('color',7);
            $table->boolean('multidis');
            $table->string('link')->nullable($value=true);
            $table->tinyText('descripcion')->nullable($value = false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facultades');
    }
}
