<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AsegurarAdminIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si no está logueado
        if (!Auth::check()) {
            return redirect()->route('login')->with('noAdminNoLogin', 'Tienes que iniciar la sesión');
        }
        // Si está logueado pero NO es admin
        if(Auth::user()->email != 'admin@admin.cat'){
            return redirect()->route('dashboard')->with('noAdminSiLogin', 'No tienes permiso a esta pagina');
        }

        // Si es admin > continuar
        return $next($request);
    }
}
