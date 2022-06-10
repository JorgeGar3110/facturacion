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
            $table->string('Nombre', 100)->nullable();
            $table->string('Paterno',100)->nullable();
            $table->string('Materno',100)->nullable();
            $table->string('RFC',13)->nullable();
            $table->integer('IdTipoUsuario')->unsigned()->index()->nullable();
            $table->integer('IdMunicipio')->unsigned()->index()->nullable();
            $table->string('Calle',100)->nullable();
            $table->string('Numero',10)->nullable();
            $table->string('Colonia',100)->nullable();
            $table->string('CP',5)->nullable();
            $table->string('Referencias')->nullable();
            $table->string('Telefono',10)->nullable();
            $table->integer('IdEstatus')->unsigned()->index()->nullable();
            $table->enum('Activo',['1','0'])->default('1')->nullable();
            $table->integer('IdUsuario')->unique()->unsigned()->index();
            $table->timestamps();

            //Relaciones
            $table->foreign('IdTipoUsuario')->references('id')->on('tipo_usuarios');
            $table->foreign('IdMunicipio')->references('id')->on('municipios');
            $table->foreign('IdEstatus')->references('id')->on('estatuses');
            $table->foreign('IdUsuario')->references('id')->on('users');
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
