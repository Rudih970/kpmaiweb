<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeadersMiddleware
{
    /**
     * Handle an incoming request and apply HTTP security headers.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // 1. Prevent clickjacking attacks
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // 2. Prevent MIME type sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // 3. Enable browser XSS protection
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // 4. Referrer Policy
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // 5. Content Security Policy (Allows Fonts, Tailwind, FontAwesome & Local Assets)
        $csp = "default-src 'self'; " .
               "script-src 'self' 'unsafe-inline' 'unsafe-eval' cdnjs.cloudflare.com fonts.googleapis.com; " .
               "style-src 'self' 'unsafe-inline' cdnjs.cloudflare.com fonts.googleapis.com; " .
               "font-src 'self' cdnjs.cloudflare.com fonts.gstatic.com data:; " .
               "img-src 'self' data: https: blob:; " .
               "frame-src 'self'; " .
               "object-src 'none';";

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
