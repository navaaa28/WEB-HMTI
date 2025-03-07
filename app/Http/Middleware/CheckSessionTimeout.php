<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckSessionTimeout
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = Session::get('last_activity');
            $timeout = 10 * 60; // 10 menit dalam detik

            if ($lastActivity && (time() - $lastActivity > $timeout)) {
                Auth::logout();
                Session::flush();
                return redirect()->route('login')->with('error', 'Sesi Anda telah berakhir karena tidak aktif selama 10 menit. Silakan login kembali.');
            }

            Session::put('last_activity', time());
        }

        return $next($request);
    }
} 