<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nreserva")->nullable();
            $table->string("autoId")->nullable();
            $table->string("autoMarca")->nullable();
            $table->string("clienteId")->nullable();
            $table->string("clienteNombres")->nullable();
            $table->string("tipodepago")->nullable();
            $table->string("banco")->nullable();
            $table->string("codigodepago")->nullable();
            $table->float("montodepositado")->nullable();
            $table->float("montorestante")->nullable();
            $table->float("montototal")->nullable();
            $table->integer("abonoprereserva")->nullable();
            $table->integer("abonoliquidacion")->nullable();
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
        Schema::dropIfExists('abonos');
    }
}
