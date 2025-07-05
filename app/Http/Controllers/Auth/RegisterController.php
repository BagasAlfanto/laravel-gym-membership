<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\QrCode\QrCodeController;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate and process the registration data
        $request->validate([
            'name' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15|unique:users,no_hp',
            'photo' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $photoPath = null;

        if ($request->filled('photo')) {
            $base64 = $request->photo;

            // Cek apakah format base64 valid
            if (preg_match('/^data:image\/(\w+);base64,/', $base64, $type)) {
                $base64 = substr($base64, strpos($base64, ',') + 1);
                $extension = strtolower($type[1]); // jpg, png, etc.

                if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    return back()->withErrors(['photo' => 'Format foto tidak didukung.']);
                }

                $decodedImage = base64_decode($base64);

                if ($decodedImage === false) {
                    return back()->withErrors(['photo' => 'Foto tidak valid.']);
                }

                // Buat nama file hash
                $fileName = Str::random(40) . '.' . $extension;

                // Pastikan direktori ada
                if (!Storage::disk('public')->exists('profile_pictures')) {
                    Storage::disk('public')->makeDirectory('profile_pictures');
                }

                // Simpan ke storage/app/public/profile_pictures
                Storage::disk('public')->put("profile_pictures/{$fileName}", $decodedImage);
                $photoPath = "{$fileName}";
            }
        }

        // generate QR code
        app(QrCodeController::class)->create($request->no_hp);

        // Create the user
        User::create([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'photo' => $photoPath,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => bcrypt($request->password),
        ]);

        // This is just a placeholder, implement your registration logic here
        return redirect()->route('login.index')->with('success', 'Registration successful! Please log in.');
    }
}
