<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class GuruMiddleware
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

        if ((Auth::check() == true && Auth::user()->role != 2) || Auth::check() == false) {
            return redirect()->route('login');
        }
        
        return $next($request);
    }
}
