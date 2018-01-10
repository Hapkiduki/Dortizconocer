<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppoinmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoinments', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo', ['llamada', 'videollamada'])->default('videollamada');
            $table->string('descripcion');
            $table->enum('estado', ['nopaga', 'pagado', 'terminado'])->default('nopaga');
            $table->integer('tipo_cita_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->date('fecha');
            $table->time('hora_ini');
            $table->time('fec_fin');

            $table->foreign('tipo_cita_id')->references('id')->on('tipo_cita')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('appoinments');
    }
}
