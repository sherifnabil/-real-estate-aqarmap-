<?php

namespace App\Http\Middleware;

use Closure;

class AdminsMiddleware
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
        // return $next($request);

        if (\Auth::check() && auth()->user()->user_type == 'admin') {
            return $next($request);
        }
        return redirect('/home');
        
    }
}
