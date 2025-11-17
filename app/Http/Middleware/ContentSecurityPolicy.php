<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // PERBAIKAN: Tambahkan domain Google Maps yang benar
        $csp = "default-src 'self'; " .
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://api.whatsapp.com https://www.threads.net https://www.youtube.com https://www.tiktok.com https://www.instagram.com https://www.facebook.com https://ashshafatour.blogspot.com https://api.rss2json.com https://unpkg.com https://fonts.googleapis.com https://fonts.gstatic.com https://maps.googleapis.com https://maps.google.com https://script.google.com https://script.googleusercontent.com; " .
            "style-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com https://cdn.tailwindcss.com https://fonts.googleapis.com https://fonts.gstatic.com; " .
            "img-src 'self' data: https: blob:; " .
            "font-src 'self' https://cdnjs.cloudflare.com https://fonts.googleapis.com https://fonts.gstatic.com; " .
            "connect-src 'self' https://api.rss2json.com https://ashshafatour.blogspot.com https://maps.googleapis.com https://maps.google.com https://script.google.com https://script.googleusercontent.com; " .
            "frame-src 'self' https://www.youtube.com https://www.tiktok.com https://www.google.com https://maps.google.com https://www.google.com/maps;";

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
