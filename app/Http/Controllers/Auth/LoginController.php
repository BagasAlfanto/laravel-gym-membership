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
        return view('pages.login');
    }

    //Proses autentikasi user
     public function store(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'no_hp'   => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah user terdaftar
        $user = Auth::getProvider()->retrieveByCredentials(['no_hp' => $credentials['no_hp']]);
        if (!$user) {
            throw ValidationException::withMessages([
                'no_hp' => __('Akun tidak ditemukan'),
            ]);
        }

        // Cek apakah akun user sudah aktif
        if ($user->status_akun !== 'active') {
            return redirect()->route('login.index')
            ->withErrors(['no_hp' => 'Akun Anda tidak aktif. Silakan aktivasi melalui admin.']);
        }

        // Cek apakah password benar
        if (!Auth::validate($credentials)) {
            throw ValidationException::withMessages([
                'password' => __('Password salah'),
            ]);
        }

        // Autentikasi user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Berhasil login sebagai admin.');
            }

            // Redirect default jika bukan admin
            return redirect()->route('checkin.index')->with('success', 'Berhasil login.');
        }
    }

    //Logout user
    public function destroy(Request $request)
    {
        Auth::logout();

        // Invalidasi session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.index')->with('success', 'Berhasil logout.');
    }
}
