<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();
        
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        if ($user) {
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admindashboard');
                case 'user':
                    return redirect()->route('userdashboard');
            }
        }

        return redirect()->route('login');
    }
}
