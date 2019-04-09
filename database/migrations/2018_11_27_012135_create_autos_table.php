<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('placa')->nullable();
            $table->string('color')->nullable();
            $table->string('anio')->nullable();
            $table->string('combustible')->nullable();
            $table->string('transmicion')->nullable();
            $table->string('cilindrada')->nullable();
            $table->integer('km_inicial')->nullable();
            $table->integer('airbag')->nullable();
            $table->integer('silla_bebe')->nullable();
            $table->integer('galones')->nullable();
            $table->integer('luna_polar')->nullable();
            $table->string('octanaje')->nullable();
            $table->float('pago_afi_men')->nullable();
            $table->float('precio_por_dia')->nullable();
            $table->float('garantia')->nullable();
            $table->string('tipo_garantia')->nullable();
            $table->string('contrato')->nullable();
            $table->date('renovacion_soat')->nullable();
            $table->date('lunas_polari')->nullable();
            $table->date('gps')->nullable();
            $table->date('inspec_tecnica')->nullable();
            $table->date('poliza_de_seguro')->nullable();
            $table->string('imagen1')->nullable();
            $table->string('imagen2')->nullable();
            $table->string('imagen3')->nullable();
            $table->string('imagen4')->nullable();
            $table->text('comentarios')->nullable();
            $table->date('fechainicioauto')->nullable();
            $table->date('fechafinauto')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('disponible')->nullable();
            $table->date('fechadepago')->nullable();
            $table->string('carroceria')->nullable();
            $table->string('numeromotor')->nullable();
            $table->string('numeroserie')->nullable();
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
        Schema::dropIfExists('autos');
    }
}
