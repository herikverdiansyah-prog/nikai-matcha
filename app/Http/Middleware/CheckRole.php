<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Cek apakah user sudah login, jika belum arahkan ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2. Cek apakah role user sesuai dengan yang diizinkan (misal: 'admin')
        if (Auth::user()->role !== $role) {
            // Jika user biasa mencoba masuk ke admin, lempar balik ke landing page dengan pesan penolakan
            return redirect('/')->with('error', 'Anda tidak memiliki hak akses ke halaman tersebut.');
        }

        return $next($request);
    }
}
