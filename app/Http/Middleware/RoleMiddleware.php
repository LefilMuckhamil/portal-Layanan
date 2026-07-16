<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah user sudah login dan rolenya sesuai
        if (! $request->user() || $request->user()->role !== $role) {
            
            // Jika tidak sesuai, tolak akses dengan error 403
            abort(403, 'Akses tidak diizinkan.');
        }

        return $next($request);
    }
}