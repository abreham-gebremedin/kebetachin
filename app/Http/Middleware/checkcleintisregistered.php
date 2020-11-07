<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkcleintisregistered
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
        $cleint=\App\Models\HireManager::where('user_account_id',Auth::user()->id)->get();
        if(count($cleint)==0){
            return redirect("reghome")->with("failure","you need conttinue as a client to access this service!!!!");
        }
        return $next($request);
    }
}
