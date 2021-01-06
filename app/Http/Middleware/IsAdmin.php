<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Auth;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (\Auth::user()->type == 'admin') {
                return $next($request);
            }
    
            alert()->error('Error','You cant access here! ');
            return redirect('menu');
            
        }

        alert()->error('Error','You cant access here! ');
            return redirect('menu');
    }
}
