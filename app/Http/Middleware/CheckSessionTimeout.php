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
            $timeout = config('session.lifetime') * 60; // Menggunakan konfigurasi dari config/session.php

            if ($lastActivity && (time() - $lastActivity > $timeout)) {
                Auth::logout();
                Session::flush();
                Session::regenerate(); // Regenerate session ID untuk keamanan
                return redirect()->route('login')
                    ->with('error', 'Sesi Anda telah berakhir karena tidak aktif. Silakan login kembali.');
            }

            // Regenerate session ID secara periodik untuk mencegah session fixation
            if (!Session::has('session_generated_at') || (time() - Session::get('session_generated_at') > 300)) {
                Session::regenerate(true);
                Session::put('session_generated_at', time());
            }

            // Catat aktivitas terakhir
            Session::put('last_activity', time());

            // Catat IP address untuk deteksi perubahan
            if (!Session::has('user_ip')) {
                Session::put('user_ip', $request->ip());
            } elseif (Session::get('user_ip') !== $request->ip()) {
                Auth::logout();
                Session::flush();
                Session::regenerate();
                return redirect()->route('login')
                    ->with('error', 'Sesi Anda telah diakhiri karena perubahan IP address.');
            }

            // Catat user agent untuk deteksi perubahan
            if (!Session::has('user_agent')) {
                Session::put('user_agent', $request->userAgent());
            } elseif (Session::get('user_agent') !== $request->userAgent()) {
                Auth::logout();
                Session::flush();
                Session::regenerate();
                return redirect()->route('login')
                    ->with('error', 'Sesi Anda telah diakhiri karena perubahan browser.');
            }
        }

        return $next($request);
    }
}