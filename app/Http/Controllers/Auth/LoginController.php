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

        // Percobaan login (kolom "no_hp" & "password")
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk mencegah fixation
            $request->session()->regenerate();

            return redirect()->intended('/qrcode');
        }

        throw ValidationException::withMessages([
            'no_hp' => __('auth.failed'),  
        ]);
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
