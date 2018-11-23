<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string("apellidoPaterno")->mullable();
            $table->string("apellidoMaterno")->mullable();
            $table->string("nombres")->mullable();
            $table->integer("dni")->mullable();
            $table->date("fechaNacimiento")->mullable();
            $table->string("correo")->mullable();
            $table->integer("celular")->mullable();
            $table->string("direccion")->mullable();
            $table->string("ciudad")->mullable();
            $table->integer("cci")->mullable();
            $table->string("banco")->mullable();
            $table->string("nombreTitularCuenta")->mullable();
            $table->string("numeroBrevete")->mullable();
            $table->date("fechaVencimientoBrevete")->mullable();
            $table->string("fotoDni")->mullable();
            $table->string("calificacionCliente")->mullable();
            $table->text("comentariosAdicionales")->mullable();
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
        Schema::dropIfExists('clientes');
    }
}
