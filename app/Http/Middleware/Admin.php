<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->expectsJson() && Auth::guard('admin')->check() ) {

            $response = [
            'status' => 401,
            'message' => 'You are Not Login',
             ];

            return response()->json($response, 401);

          }else{
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }
        return redirect()->route('admin_login');
    }
}
