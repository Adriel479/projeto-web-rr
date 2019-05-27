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
            $table->increments('id_reserva');
            $table->date('data_reserva');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_recurso')->unsigned();
            $table->string('estado_reserva', 1);
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_recurso')->references('id_recurso')->on('recursos');
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
