<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotProvider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if(!Auth::guard($guard)->check()){
            return redirect('/provider/login');
        }
        return $next($request);
    }
}
