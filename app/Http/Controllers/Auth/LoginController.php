<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    //Proses autentikasi user
     public function store(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'no_hp'   => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah user terautentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Berhasil login sebagai admin.');
            }

            // Redirect default jika bukan admin
            return redirect()->route('checkin.index')->with('success', 'Berhasil login.');
        }

        // Jika autentikasi gagal
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        if (!$user) {
            throw ValidationException::withMessages([
            'no_hp' => __('Akun tidak ditemukan'),
            ]);
        }

        throw ValidationException::withMessages([
            'password' => __('Password salah'),
        ]);
    }

    //Logout user
    public function destroy(Request $request)
    {
        Auth::logout();

        // Invalidasi session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
