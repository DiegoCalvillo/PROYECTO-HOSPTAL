<?php

namespace Hospital\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Admin
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         if($this->auth->user()->tipo_usuario->clave != "01")
        {
            Session::flash('message-error', 'Lo sentimos, pero su cuenta no tiene privilegios de administrador');
            return redirect()->to('/');
        }

        return $next($request);
    }
}
