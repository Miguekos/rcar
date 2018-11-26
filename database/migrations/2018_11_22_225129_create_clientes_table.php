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
            $table->string("apellidoPaterno")->nullable();
            $table->string("apellidoMaterno")->nullable();
            $table->string("nombres")->nullable();
            $table->integer("dni")->nullable();
            $table->string("image")->nullable();
            $table->date("fechaNacimiento")->nullable();
            $table->string("correo")->nullable();
            $table->integer("celular")->nullable();
            $table->string("direccion")->nullable();
            $table->string("ciudad")->nullable();
            $table->integer("cci")->nullable();
            $table->string("banco")->nullable();
            $table->string("nombreTitularCuenta")->nullable();
            $table->string("numeroBrevete")->nullable();
            $table->date("fechaVencimientoBrevete")->nullable();
            $table->string("fotoDni")->nullable();
            $table->string("calificacionCliente")->nullable();
            $table->text("comentariosAdicionales")->nullable();
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
