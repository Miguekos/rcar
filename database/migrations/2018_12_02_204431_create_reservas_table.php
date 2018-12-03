<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechasInicio')->nullable();
            $table->date('fechaFin')->nullable();
            $table->integer('vehiculo')->nullable();
            $table->integer('cliente')->nullable();
            $table->integer('producto')->nullable();
            $table->integer('promo_id')->unsigned();
            $table->foreign ('promo_id')->references('id')->on('promos');
            $table->integer('zonaDeEntrega')->nullable();
            $table->string('direccionEntrega')->nullable();
            $table->integer('seguro')->nullable();
            $table->integer('puntosDisponible')->nullable();
            $table->integer('PuntosCanjear')->nullable();
            $table->integer('diaAdicionales')->nullable();
            $table->integer('sillaBebe')->nullable();
            $table->integer('doblePiloto')->nullable();
            $table->integer('tanqueLleno')->nullable();
            $table->string('autoSeleccionado')->nullable();
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
        Schema::dropIfExists('reservas');
    }
}
