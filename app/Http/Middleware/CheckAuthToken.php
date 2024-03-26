<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuthToken
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            // User is not authenticated, redirect to login page
            return redirect()->route('login');
        }

        // User is authenticated, proceed to the next middleware or route handler
        return $next($request);
    }
}
