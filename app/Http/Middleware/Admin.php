<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika belum login
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Jika bukan admin
        if (!$request->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        // Jika admin, lanjutkan request
        return $next($request);
    }
}
