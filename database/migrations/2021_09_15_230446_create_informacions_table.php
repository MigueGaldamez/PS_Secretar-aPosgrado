<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyText('urlLogo');
            $table->text('quienesSomos');
            $table->text('mision');
            $table->text('vision');
            $table->string('correo');
            $table->tinyText('horarioAtencion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacions');
    }
}
