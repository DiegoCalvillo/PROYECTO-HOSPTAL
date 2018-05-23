<?php

namespace Hospital;

use Illuminate\Database\Eloquent\Model;

class ExpedienteClinico extends Model
{
    protected $table = "expediente_clinico";
    protected $fillable = ['id', 'medico_id', 'padecimiento_id', 'estatura', 'peso', 'observaciones', 'fecha_nac', 'edad'];

    public static function paciente($id_paciente)
    {
    	return ExpedienteClinico::where('id', '=', $id_paciente)->get();
    }
}
