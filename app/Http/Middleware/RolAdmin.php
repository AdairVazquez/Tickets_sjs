<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificamos si el usuario está autenticado y tiene id_rol = 1
        if (Auth::check() && Auth::user()->rol_id == 1) {
            return $next($request);
        }

        // Si no cumple, puedes redirigirlo o devolver un 403
        return //redirect('/')->with('error', 'No tienes permiso para acceder a esta página.');
        abort(403, 'Acceso no autorizado');
    }
}
