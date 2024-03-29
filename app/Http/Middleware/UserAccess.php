<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if (auth()->check() && auth()->user()->type == $userType) {
            return $next($request);
        }

        return response()->json(['status' => 403, 'message' => 'You do not have permission to access for this page.'], 403);

        // Check if the user is not logged in or if user type matches
        // if (!$request->user() || $request->user()->type == $userType) {
        //     return $next($request);
        // }

        // // If the user type doesn't match, redirect to home page or return unauthorized response
        // if ($request->user()->type == 0) { // user role
        //     return redirect()->route('home');
        // } elseif ($request->user()->type == 1) { //admin role
        //     return redirect()->route('admin/home');
        // } else {
        //     return response()->json(['message' => 'Unauthorized.'], 403);
        // }
    }
}
