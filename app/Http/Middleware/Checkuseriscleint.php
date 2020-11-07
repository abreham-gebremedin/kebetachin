<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Checkuseriscleint
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
        if(empty( $usertype) || $usertype!="client"){
            return  redirect()->back()->with("failure","you need login as a cleint to access this service!!!!");
        }

        
        return $next($request);
    }
}
