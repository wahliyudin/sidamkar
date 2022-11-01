<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (isset(Auth::user()->status_akun)) {
            if (Auth::user()->status_akun == 0) {
                Auth::logout();
                return redirect()->route('login')->with('warning', 'Anda belum diverifikasi oleh Admin');
            }
            if (Auth::user()->status_akun == 2) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Maaf!, anda ditolak oleh Admin');
            }
        }
        return $next($request);
    }
}
