<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('auth_user')) {
            return redirect()->route('login')
                ->with('error', 'Prašome prisijungti.');
        }

        return $next($request);
    }
}