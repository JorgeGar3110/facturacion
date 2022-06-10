<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IdCliente')->unsigned()->index();
            $table->integer('IdNegocio')->unsigned()->index();
            $table->date('FechaSolicitud');
            $table->text('Cuerpo');
            $table->text('Firma');
            $table->datetime('FechaFirma');
            $table->integer('IdEstatus')->unsigned()->index();
            $table->integer('IdUso')->unsigned()->index();
            $table->enum('Activo',['1','0'])->default('1');
            $table->timestamps();

            //Relaciones
            $table->foreign('IdCliente')->references('id')->on('clientes');
            $table->foreign('IdNegocio')->references('id')->on('negocios');
            $table->foreign('IdEstatus')->references('id')->on('estatuses');
            $table->foreign('IdUso')->references('id')->on('uso_cfdis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
