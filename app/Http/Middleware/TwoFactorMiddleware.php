<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class TwoFactorMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->google2fa_secret && !$request->session()->has('2fa_authenticated')) {
            return redirect()->route('2fa.verify');
        }

        return $next($request);
    }
}
