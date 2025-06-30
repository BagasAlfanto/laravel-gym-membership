<?php

namespace App\Http\Controllers\QrCode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function create($no_hp)
    {
        // Generate QR code
        $qrCode = QrCode::size(300)->generate($no_hp);

        // Save QR code to storage
        $path = 'qrcodes/' . $no_hp . '.svg';
        Storage::disk('public')->put($path, $qrCode);

        return response()->json(['path' => $path]);
    }
}
