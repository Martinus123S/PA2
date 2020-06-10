<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Role
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
        $user = \Session::get('user');
        if(\Session::has('user')){
            if($user->id_role==1){
                return $next($request);
            }
            if($user->id_role==2){
                return $next($request);
            }
            if($user->id_role==3){
                return $next($request);
            }
        }else{
            return redirect()->route('home');
        }
    }
}
