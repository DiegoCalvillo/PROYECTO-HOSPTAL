<?php

namespace Hospital\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'usuarios/store',
        'tipo_usuarios/store',
        'login/store',
        'pacientes/store',
        'usuarios/search',
        'tipo_usuarios/search',
        'expediente/store',
    ];
}
