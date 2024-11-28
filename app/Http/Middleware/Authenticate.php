<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next)
    {      
        // Asegúrate de que el usuario esté autenticado y sea admin
        if (!Auth::check()) {
            abort(403, 'Acceso denegado: iSolo adminstradores pueden realizar esta acción.');
        }

        return $next($request);
    }
}
