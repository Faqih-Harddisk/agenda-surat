<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
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
        // Cek apakah user sudah login (ada session is_logged_in)
        if (session()->has('is_logged_in') && session('is_logged_in')) {
            return $next($request);
        }

        // Jika belum login, redirect ke halaman login
        return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu!');
    }
}
