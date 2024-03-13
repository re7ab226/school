<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if(!empty(Auth::check()))
         {
            if (Auth::user()->user_type == 3) {
                return $next($request);
            }
             else {
                Auth::logout();
                return redirect(url(''));
            }
        } else {

            Auth::logout();
            return redirect(url(''));
        }
    }
}
