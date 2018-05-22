<?php

namespace Hospital;

use Illuminate\Database\Eloquent\Model;

class ExpedienteClinico extends Model
{
    protected $table = "expediente_clinico";
    protected $fillable = ['id', 'medico_id', 'padecimiento_id', 'estatura', 'peso', 'observaciones', 'fecha_nac', 'edad'];
}
