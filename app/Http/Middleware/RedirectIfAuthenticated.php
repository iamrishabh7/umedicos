<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
            if(Auth::user()->role == 0){
                return redirect('/admin/dashboard');
            }
            if(Auth::user()->role == 1){
                if(Auth::user()->is_profile_completed){
                    return redirect('/doctor/profile');
                }else{
                    return redirect('/doctor/profile/edit');
                }
            }
            if(Auth::user()->role == 2){
                return redirect('/patient/profile');
            }
            

        }

        return $next($request);
    }
}
