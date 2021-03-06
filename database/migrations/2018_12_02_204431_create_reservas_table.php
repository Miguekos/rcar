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
            $table->integer('nreserva')->nullable();
            $table->date('fechasInicio')->nullable();
            $table->date('fechaFin')->nullable();
            $table->integer('vehiculo')->nullable();
            $table->string('cliente')->nullable();
            $table->string('clienteId')->nullable();
            $table->integer('producto')->nullable();
            $table->string('promo')->nullable();
            $table->integer('zonaDeEntrega')->nullable();
            $table->string('direccionEntrega')->nullable();
            $table->integer('puntosDisponible')->nullable();
            $table->integer('PuntosCanjear')->nullable();
            $table->integer('diaAdicionales')->nullable();
            $table->integer('sillaBebe')->nullable();
            $table->integer('doblePiloto')->nullable();
            $table->integer('tanqueLleno')->nullable();
            $table->string('autoSeleccionado')->nullable();
            $table->integer('estado')->nullable();
            $table->float('preciovihiculo')->nullable();
            $table->float('productos')->nullable();
            $table->float('seguro')->nullable();
            $table->float('diaadicional')->nullable();
            $table->float('totalF')->nullable();
            $table->float('diasdisponible')->nullable();
            $table->string('tipodepago')->nullable();
            $table->string('banco')->nullable();
            $table->string('codigodepago')->nullable();
            $table->float('montodepositado')->nullable();
            $table->string('placa')->nullable();
            $table->string('color')->nullable();
            $table->string('anio')->nullable();
            $table->string('precio')->nullable();
            $table->string('garantia')->nullable();
            $table->string('image')->nullable();
            $table->string('kilometroinicial')->nullable();
            $table->string('kilometrodevolucion')->nullable();
            $table->string('subircontrato')->nullable();
            $table->string('comentariocontrato')->nullable();
            $table->string('penalidadporkm')->nullable();
            $table->string('pagopord')->nullable();
            $table->string('lucrosesante')->nullable();
            $table->string('multa')->nullable();
            $table->string('zonadelivery')->nullable();
            $table->integer('disponible')->nullable();
            $table->integer('entrega')->nullable();
            $table->integer('liquidacion')->nullable();
            $table->float('cobrosadi')->nullable();
            $table->string('totaladevolver')->nullable();
            $table->string('otroscobros')->nullable();
            $table->integer('exonerar')->nullable();
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
