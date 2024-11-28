<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (!Auth::check() || Auth::user()->id !== 12) {
            abort(403, 'Acceso denegado: Solo administradores pueden realizar esta acción.');
        }

        return $next($request);
    }
}
