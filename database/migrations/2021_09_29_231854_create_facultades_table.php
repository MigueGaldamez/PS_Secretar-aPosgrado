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
            $table->string('urlImagen')->nullable($value = false);
            $table->string('nombre',60)->nullable($value = false);
            $table->tinyText('contactoDiplomado',150)->nullable($value = false);
            $table->char('telefonoPosgrado',8)->nullable($value = false);
            $table->string('extPosgrado',20)->nullable($value = true);
            $table->string('correoPosgrado',40)->nullable($value = false);
            $table->char('color',7)->nullable($value = false);
            $table->boolean('multidis');
            $table->tinyText('descripcion')->nullable($value = false);
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
        Schema::dropIfExists('facultades');
    }
}
