<?php

namespace App\Http\Middleware;

use Closure;

class Checkuserisfrelancer
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
        $usertype = $request->session()->get('usertype');
        if(empty( $usertype) || $usertype!="freelancer"){
            return  redirect()->back()->with("failure","you need login as a freelancer to access this service!!!!");
        }
        return $next($request);
    }
}
