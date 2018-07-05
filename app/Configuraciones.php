<?php

namespace Hospital;

use Illuminate\Database\Eloquent\Model;

class Configuraciones extends Model
{
    protected $table = 'configuraciones';
    protected $fillable = ['id', '[nombre_configuracion', 'id'];

    public static function numero_intentos()
    {	
  		return Configuraciones::where('nombre_configuracion', '=', 'Numero de Intentos')->get(['valor'])->first();
    }
    
}
