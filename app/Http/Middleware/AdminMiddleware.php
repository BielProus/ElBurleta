<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario está autenticado y es el administrador con ID 12
        if (!Auth::check() || Auth::user()->id !== 12) {
            abort(403, 'Acceso denegado. Solo los administradores pueden realizar esta acción.');
        }

        return $next($request);
    }
}
