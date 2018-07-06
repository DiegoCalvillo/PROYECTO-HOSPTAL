<?php

namespace Hospital;

use Illuminate\Database\Eloquent\Model;

class Configuraciones extends Model
{
    protected $table = 'configuraciones';
    protected $fillable = ['id', 'nombre_configuracion', 'estatus_id'];

    public static function numero_intentos()
    {	
  		return Configuraciones::where('nombre_configuracion', '=', 'Numero de Intentos')->get(['valor'])->first();
    }
    
    public static function numero_intentos_activo()
    {
    	return Configuraciones::where('nombre_configuracion', '=', 'Numero de Intentos')->get(['estatus_id'])->first()->estatus_id;
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'estatus_id');
    }
}
