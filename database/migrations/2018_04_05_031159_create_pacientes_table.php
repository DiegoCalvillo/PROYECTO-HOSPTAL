<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_paciente');
            $table->string("ap_paterno");
            $table->string("ap_materno");
            $table->integer("genero_paciente");
            $table->integer("estado_paciente");
            $table->integer("municipio_paciente");
            $table->string("calle_paciente");
            $table->string("email");
            $table->string("numero_casa_paciente");
            $table->string("colonia_paciente");
            $table->string("codigo_postal_paciente");
            $table->integer('medico_id');
            $table->integer('expediente_id');
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
        Schema::dropIfExists('pacientes');
    }
}
