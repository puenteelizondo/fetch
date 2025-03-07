<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario tiene una sesión activa
        if (!$request->session()->has('info_usuario')) {

            // Funciona cuando se usa rutas api
            if($request->is('api/*')){
                return response()->json('Debe iniciar sesión primero', Response::HTTP_FORBIDDEN );
            }

            // Funciona con cualquier otra ruta web
            return redirect('/')->with('error', 'Debe iniciar sesión primero');
        }

        return $next($request);
    }
}
