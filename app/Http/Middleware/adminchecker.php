<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class adminchecker
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
        if (Auth::check()) {
            if ($request->user()->hasRole('setup')) {
                return redirect('setup');
            }
            if ($request->user()->hasRole('user')) {
                return redirect('home');
            }
        }
        else{
            return redirect('home');
        }
        return $next($request);
    }
}
