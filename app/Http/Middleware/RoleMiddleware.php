<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get the authenticated user's role
        $userRole = Auth::user()->role->name;

        // Check if the user's role has permission to access the page
        if (!in_array($userRole, $roles)) {
            // User's role does not have permission, redirect or show error message
            return redirect()->to('/');
            // You can customize this to handle unauthorized access as needed
        }

        // User's role has permission, allow access to the page
        return $next($request);
    }
}