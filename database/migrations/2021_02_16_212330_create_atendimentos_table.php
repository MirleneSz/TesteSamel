<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_paciente')->unsigned()->nullable();
            $table->integer('id_medico')->unsigned()->nullable();
            $table->datetime('inicio');
            $table->datetime('termino');

            $table->timestamps();
            $table->foreign('id_medico')->references('id')->on('medicos');
            $table->foreign('id_paciente')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimentos');
    }
}
