<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvanceInternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avance_interno', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diagnostico_id')->unsigned();
            $table->string('descripcion');

            $table->foreign('diagnostico_id')->references('id')->on('diagnostico')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('avance_interno');
    }
}
