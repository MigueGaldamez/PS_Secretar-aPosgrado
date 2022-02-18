<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('posgrado_id')->unsigned();
            $table->year('publicado');
            $table->text('titulo');
            $table->string('autor');
            $table->string('link');
            $table->unsignedBigInteger('estado')->unsigned();
            $table->foreign('posgrado_id')->references('id')->on('posgrados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tesis');
    }
}
