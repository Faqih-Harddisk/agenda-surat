<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Memeriksa logika login
     */
    public function login(Request $request)
    {
        // 1. Ambil input 'username' dari form
        $username = $request->input('username');
        $password = $request->input('password');

        // Debug: tampilkan apa yang diterima (opsional)
        // dd(['username' => $username, 'password' => $password]);

        // 2. Validasi username dan password
        if ($username == 'admin' && $password == 'admin123') {
            // Jika login berhasil, simpan ke session
            session(['is_logged_in' => true]);
            return redirect('/surat')->with('success', 'Berhasil login!');
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            return redirect('/login')
                ->withInput($request->only('username'))
                ->with('error', 'Username atau password salah!');
        }
    }

    /**
     * Logout - menghapus session
     */
    public function logout()
    {
        // Hapus session is_logged_in
        session()->forget('is_logged_in');
        return redirect('/')->with('success', 'Anda telah logout!');
    }
}             