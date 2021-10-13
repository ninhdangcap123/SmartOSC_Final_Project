<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeamSAT
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
        return (Auth::check() && Qs::userIsTeamSAT()) ? $next($request) : redirect()->route('login');
    }
}
