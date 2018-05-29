<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        /**
         * Here, $request->user()===null check the user() is logged in or not.
         */
        if($request->user()===null)
        {
            return response('Insufficient Permission',401);
            //return redirect(route('home'));
        }
        $actions=$request->route()->getAction();
        $roles=isset($actions['roles'])? $actions['roles'] : null;
        if($request->user()->hasAnyRole($roles) || !$roles)
        {
             return $next($request);
        }
          return response('Insufficient Permission',401);
        //return redirect(route('home'));
    }
}
