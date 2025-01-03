<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware extends Middleware
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {     
        // Asegúrate de que el usuario esté autenticado y sea admin
        if (Auth::user()->id !== 12) {
            abort(403, 'Acceso denegado: Solo administradores pueden realizar esta acción.');
        }

        return $next($request);
    }
}
