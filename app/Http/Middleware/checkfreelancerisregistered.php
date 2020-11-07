<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkfreelancerisregistered
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
        $freelancer=\App\Models\freelancer::where('userid',Auth::user()->id)->get();
        if(count($freelancer)==0){
            return redirect("reghome")->with("failure","you need conttinue as a freelancer to access this service!!!!");
        }
        return $next($request);
    }
}
