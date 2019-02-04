<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class Authadmin
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
        if(Session::has('admin')){
            return $next($request);
        }
        return redirect('admin');
    }
}
