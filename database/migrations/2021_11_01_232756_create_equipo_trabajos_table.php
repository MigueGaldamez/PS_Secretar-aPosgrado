<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipoTrabajos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urlImagen');
            $table->string('nombre',100);
            $table->string('cargo',100);
            $table->text('descripcion');
            $table->string('contacto',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipoTrabajos');
    }
}
