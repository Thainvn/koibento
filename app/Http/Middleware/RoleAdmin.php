<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use View;
class RoleAdmin
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
        
        if (Auth::user() &&  Auth::user()->dec == 1) {

            return $next($request);
         }
        return redirect('/user/login');
         
    }
}
