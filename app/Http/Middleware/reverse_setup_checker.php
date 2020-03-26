<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class reverse_setup_checker
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
            if ($request->user()->hasRole('user')) {
                return redirect('home');
            }
            return $next($request);

        }else{
            return redirect('home');

        }
    }
}
