<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Gym - Register</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1593079831268-3381b0db4a77?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: brightness(0.5);
        }
    </style>
</head>

<body class="">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    {{-- Kamera & Selfie --}}
                    <div>
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Ambil Selfie</label>
                        <div id="cameraContainer" class="mb-2">
                            <video id="video" autoplay playsinline class="w-full rounded mb-2 mt-2"></video>
                            <button type="button" id="captureBtn"
                                class="w-full py-2 px-4 bg-indigo-500 text-white rounded hover:bg-indigo-600">Ambil
                                Selfie</button>
                        </div>
                        <canvas id="canvas" class="hidden"></canvas>
                        <input type="hidden" name="photo" id="photoInput">
                        <div id="previewContainer" class="hidden">
                            <img id="preview" class="w-full rounded mt-2" alt="Preview">
                            <div class="flex gap-2 mt-2">
                                <button type="button" id="retakeBtn"
                                    class="w-1/2 py-2 px-4 bg-gray-400 text-white rounded hover:bg-gray-500">Ambil
                                    Ulang</button>
                            </div>
                        </div>
                        <small class="text-gray-500 block mt-2">Izinkan akses kamera dan selfie untuk upload
                            gambar.</small>
                    </div>

                    {{-- Form Input --}}
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input type="text" id="name" name="name" required
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white focus:outline-none hover:border-indigo-400"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">No HP</label>
                            <input type="tel" id="no_hp" name="no_hp" required
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white focus:outline-none hover:border-indigo-400"
                                placeholder="Masukkan nomor HP">
                        </div>
                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <input id="alamat" name="alamat" required
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white focus:outline-none hover:border-indigo-400"
                                placeholder="Masukkan alamat lengkap">
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white focus:outline-none hover:border-indigo-400">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="password" name="password" required
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white focus:outline-none hover:border-indigo-400"
                                placeholder="Masukkan password">
                        </div>
                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white focus:outline-none hover:border-indigo-400"
                                placeholder="Masukkan ulang password">
                            <p id="password-error" class="text-red-500 text-sm mt-1 hidden">Password tidak cocok.</p>
                        </div>

                        <button type="submit" id="submitBtn" disabled
                            class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-300 focus:outline-none transition opacity-50 cursor-not-allowed">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="{{ Vite::asset('resources/js/auth/register.js') }}"></script>
</body>

</html>
