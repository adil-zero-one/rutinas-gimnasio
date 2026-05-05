<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoloCliente
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // si es admin lo mandamos a descansar
        if (auth()->user()->email === 'admin@admin.cat') {
        return redirect()->route('dashboard')->with('adminTrampa', 'Deja los clientes tranquilos');
    }
        return $next($request);
    }
}
