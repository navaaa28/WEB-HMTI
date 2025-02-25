<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login dan memiliki is_admin = true
        if (!auth()->check() || auth()->user()->is_admin !== 1) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
