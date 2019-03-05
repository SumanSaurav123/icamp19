<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Redirect;
class AuthCheckMiddleware
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
        if(Session::has('MemberEmail'))
        {
            return $next($request);
        }
        return Redirect::to('member/login');
    }
}
