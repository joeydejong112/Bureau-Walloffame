<?php

namespace App\Http\Middleware;

use App\roles;
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
            if ($request->user()->hasRole('admin')) {
                $valid = roles::where('user_id', Auth::user()->id)->first();

                if ($valid->role_id == 2) {
                    return $next($request);

                } else {
                    return redirect('home');

                }

            }
        } else {
            return redirect('home');
        }
    }
}
