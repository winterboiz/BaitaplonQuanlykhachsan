<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        if (Auth::guard($guard)->check()) {
//            return redirect('/admin');
//        }
//
//            dd($guard);
        switch ($guard) {
            case 'customer':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('frontend.home.index');
                }
                break;

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/admin');
                }
                break;
        }
        return $next($request);
    }

}
