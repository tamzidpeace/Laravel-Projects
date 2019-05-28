<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HospitalMiddleware
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
        //checking if the user has role for hospital

        $user = Auth::user();

        if(!$user->isHospital()) {
            return redirect('/home')->with('warning', 'You do not have hospital perminssion');
        }
        
        return $next($request);
    }
}
