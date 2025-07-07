<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check user role
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        $role = $user->role;

        if ($role === 'admin') {
            if ($request->routeIs('admin.dashboard')) {
                return $next($request);
            } else {
                return redirect()->route('admin.dashboard')
                    ->with('error', 'Akses ditolak. Admin hanya dapat mengakses dashboard.');
            }
        }

        if ($role === 'member') {
            if ($request->routeIs('checkin.index')) {
                return $next($request);
            } else {
                return redirect()->route('checkin.index')
                    ->with('error', 'Akses ditolak. Member hanya dapat mengakses halaman check-in.');
            }
        }

        return redirect()->route('login')->with('error', 'Kamu tidak memiliki akses ke halaman ini.');
    }
}
