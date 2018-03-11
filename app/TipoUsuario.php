<?php

namespace Hospital;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = "tipo_usuarios";
    protected $fillable = ['id', 'tipo_usuario', 'estatus_id'];

    public function estatus()
    {
    	return $this->belongsTo(Estatus::class, 'estatus_id');
    }
}
