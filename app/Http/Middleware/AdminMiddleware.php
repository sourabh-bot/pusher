<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard=null)
    {
        // if(Auth::guard($guard)->check() &&  $guard == "admin"){
        //         return route('dashboard');
        // }else{
        //     return 'admin/login';
        // }
        // return $next($request);

        switch($guard){
            case 'admin': 
                if(Auth::guard($guard)->check()){
                    return redirect()->route('dashboard');
                }

            break;

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin-login');
                }
            break;
        }

        return $next($request);
    }
}
