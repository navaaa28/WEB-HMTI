<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // X-Frame-Options: Mencegah clickjacking
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // X-XSS-Protection: Mengaktifkan XSS filter browser
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // X-Content-Type-Options: Mencegah MIME type sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Referrer-Policy: Mengontrol informasi referrer
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Content-Security-Policy: Mengontrol sumber daya yang diizinkan
        $response->headers->set(
            'Content-Security-Policy',
            "default-src 'self'; " .
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https:; " .
            "style-src 'self' 'unsafe-inline' https:; " .
            "img-src 'self' data: https:; " .
            "font-src 'self' https:; " .
            "connect-src 'self' https:; " .
            "frame-ancestors 'none';"
        );

        // Strict-Transport-Security: Memaksa HTTPS
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');

        // Permissions-Policy: Mengontrol fitur browser
        $response->headers->set(
            'Permissions-Policy',
            'accelerometer=(), camera=(), geolocation=(), gyroscope=(), magnetometer=(), microphone=(), payment=(), usb=()'
        );

        // Cache-Control: Mengontrol caching
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, proxy-revalidate, max-age=0');

        // Pragma: Mencegah caching di browser lama
        $response->headers->set('Pragma', 'no-cache');

        // Expires: Mencegah caching di browser lama
        $response->headers->set('Expires', '0');

        return $response;
    }
} 