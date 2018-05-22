<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedienteClinicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente_clinico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id');
            $table->integer('medico_id');
            $table->integer('padecimiento_id');
            $table->integer('estatura');
            $table->integer('peso');
            $table->string('observaciones');
            $table->date('fecha_nac');
            $table->integer('edad');
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
        Schema::dropIfExists('expediente_clinicos');
    }
}
