<?php

namespace Hospital;

use Illuminate\Database\Eloquent\Model;

class EstadosPais extends Model
{
    protected $table = 'estados_pais';
    protected $fillable = ['id', 'nombre_estado'];
}
