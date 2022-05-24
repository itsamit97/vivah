<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperAdminbMiddleware
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
        if (Auth::User() != null && Auth::User()->role == 1) {
             return $next($request);
        }else{

            return Redirect('login')->withErrors(['msg' => 'You Do  Not Have Permissoion Access This page']);

        }
       
    }
}
