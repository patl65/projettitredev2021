<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if(!auth()->user()->administrator === true){
        //code corrigé sur recommandation d'Alexandre : code popre
        if (!auth()->user()->administrator) {
            return redirect('/profile', 302)->with('error', 'Vous devez être administrateur pour accéder à cette page');
        }
        return $next($request);
    }
}
