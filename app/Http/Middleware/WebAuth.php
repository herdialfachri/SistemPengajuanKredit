<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WebAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('token')) {
            return redirect()->route('login.form')->withErrors(['login' => 'Silakan login dulu']);
        }

        return $next($request);
    }
}