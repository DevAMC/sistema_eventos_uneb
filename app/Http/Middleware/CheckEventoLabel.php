<?php

namespace App\Http\Middleware;

use Closure;

class CheckEventoLabel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(session('id_label_evento'))){
            return redirect('/selecionaLabelEvento');
        }

        return $next($request);
    }
}
