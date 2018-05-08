<?php

namespace Hospital;

use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    protected $table = "pacientes";
    protected $fillable = ['id', 'nombre_paciente', 'ap_paterno', 'ap_materno', 'genero_paciente', 'estado_paciente', 'municipio_paciente', 'calle_paciente', 'email', 'numero_casa_paciente', 'colonia_paciente', 'numero_postal_paciente'];

    public function municipios()
    {
    	return $this->belongsTo(Municipios::class, 'municipio_paciente');
    }

    public function estados()
    {
    	return $this->belongsTo(EstadosPais::class, 'estado_paciente');
    }
}
