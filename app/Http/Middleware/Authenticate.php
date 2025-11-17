<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // Cek apakah URL mengandung 'admin'
            if ($request->is('admin/*') || $request->is('admin')) {
                return route('admin.login');
            }

            // Fallback ke login default (jika ada area user biasa)
            return route('login');
        }

        return null;
    }
}
