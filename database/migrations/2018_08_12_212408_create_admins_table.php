<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre',100)->nullable();
            $table->string('Paterno',100)->nullable();
            $table->string('Materno',100)->nullable();
            $table->integer('IdUsuario')->unique()->unsigned()->index();
            $table->enum('Activo',['1','0'])->default('1')->nullable();
            $table->timestamps();

            //Relaciones
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
        Schema::dropIfExists('admins');
    }
}
