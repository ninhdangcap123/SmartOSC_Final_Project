<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MyParent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return (Auth::check() && Qs::userIsParent()) ? $next($request) : redirect()->route('login');
    }
}
