<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReseniaHistoricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reseniaHistoricas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('anio');
            $table->unsignedTinyInteger('importancia',1)->autoIncrement(false);
            $table->mediumText('descripcion');
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
        Schema::dropIfExists('reseniaHistoricas');
    }
}
