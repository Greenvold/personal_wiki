<?php

namespace App\Http\Middleware;

use Closure;

class IsTeacher
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

        if (auth()->user()->hasGroup('Teacher')) {
            return $next($request);
        } else {
            // dd(auth()->user()->groups);
            return redirect(route('home.registrationNeeded'));
        }
    }
}