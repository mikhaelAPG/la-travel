<?php

namespace App\Http\Middleware;

use Closure;


use App\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Auth;

class IsNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->type == "admin"){
                alert()->error('Error','You cant access here! ');
                return redirect('/admin');
            }

            return $next($request);
            
        }

        return $next($request);
    }
       
}
