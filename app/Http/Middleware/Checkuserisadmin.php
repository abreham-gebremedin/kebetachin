<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Checkuserisadmin
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
         if(Auth::user()->isadmin==0){
            return  redirect()->back()->with("failure","you need login as a cleint to access this service!!!!");
        }
        return $next($request);
    }
}
