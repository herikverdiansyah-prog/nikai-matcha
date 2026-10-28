<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan Form Login
    public function showLogin() {
        return view('auth.login');
    }

    // Memproses Login Pintu Tunggal
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Pengecekan Hak Akses/Role setelah Login Berhasil
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/');
        }

        return back()->with('error', 'Email atau password salah. Silakan coba kembali.');
    }

    // Menampilkan Form Registrasi
    public function showRegister() {
        return view('auth.register');
    }

    // Memproses Pendaftaran User Baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Otomatis menjadi user/customer biasa
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Akun berhasil dibuat! Selamat datang di NIKAI Matcha.');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
