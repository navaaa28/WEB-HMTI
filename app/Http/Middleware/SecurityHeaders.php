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

        // X-Frame-Options: Mencegah clickjacking dengan kebijakan yang lebih ketat
        $response->headers->set('X-Frame-Options', 'DENY');

        // X-XSS-Protection dengan report-uri
        $response->headers->set('X-XSS-Protection', '1; mode=block; report=/xss-report');

        // X-Content-Type-Options
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Referrer-Policy yang lebih ketat
        $response->headers->set('Referrer-Policy', 'no-referrer');

        // Content-Security-Policy yang lebih komprehensif
        $response->headers->set(
            'Content-Security-Policy',
            "default-src 'self'; " .
            "script-src 'self' 'nonce-" . csrf_token() . "' https://cdn.jsdelivr.net https://code.jquery.com; " .
            "style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com; " .
            "img-src 'self' data: blob: filesystem: http: https:; " .
            "font-src 'self' https://fonts.gstatic.com; " .
            "connect-src 'self' https:; " .
            "frame-ancestors 'none'; " .
            "form-action 'self'; " .
            "base-uri 'self'; " .
            "object-src 'none'; " .
            "upgrade-insecure-requests;"
        );

        // HSTS dengan preload
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');

        // Permissions-Policy yang lebih komprehensif
        $response->headers->set(
            'Permissions-Policy',
            'accelerometer=(), camera=(), geolocation=(), gyroscope=(), magnetometer=(), microphone=(), payment=(), usb=(), interest-cohort=(), autoplay=(), fullscreen=(self)'
        );

        // Cache-Control untuk mencegah caching data sensitif
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, proxy-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        // Cross-Origin-Embedder-Policy
        $response->headers->set('Cross-Origin-Embedder-Policy', 'require-corp');
        
        // Cross-Origin-Opener-Policy
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin');

        // Cross-Origin-Resource-Policy
        $response->headers->set('Cross-Origin-Resource-Policy', 'same-origin');

        return $response;
    }
}