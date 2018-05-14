<?php

namespace Hospital;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ap_paterno', 'ap_materno', 'username', 'tipo_usuario_id', 'email', 'password', 'estatus_usuario_id', 'num_intentos',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tipo_usuario()
    {
        return $this->belongsTo(TipoUsuario::class);
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'estatus_usuario_id');
    }
}
