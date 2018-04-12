<?php

namespace Hospital;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = "municipios";
    protected $fillable = ['id', 'nombre_munipcio', 'estado_id'];

    public function estados()
    {
    	return $this->belongsTo(EstadosPais::class, 'estado_id');
    }

    public static function municipios($id) 
    {
    	return Municipios::where('estado_id', '=', $id)->get();
    }

}
