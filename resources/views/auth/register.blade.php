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
            background-image: url('https://i.pinimg.com/736x/95/77/ee/9577ee1b2c853ffbc761335349acab89.jpg');
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
                            <button type="button" id="captureBtn" class="w-full py-2 px-4 bg-indigo-500 text-white rounded hover:bg-indigo-600">Ambil Selfie</button>
                        </div>
                        <canvas id="canvas" class="hidden"></canvas>
                        <input type="hidden" name="photo" id="photoInput">
                        <div id="previewContainer" class="hidden">
                            <img id="preview" class="w-full rounded mt-2" alt="Preview">
                            <div class="flex gap-2 mt-2">
                            <button type="button" id="retakeBtn" class="w-1/2 py-2 px-4 bg-gray-400 text-white rounded hover:bg-gray-500">Ambil Ulang</button>
                            </div>
                        </div>
                        <small class="text-gray-500 block mt-2">Izinkan akses kamera dan selfie untuk upload gambar.</small>
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
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white focus:outline-none hover:border-indigo-400">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="password" name="password" required
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white focus:outline-none hover:border-indigo-400"
                                placeholder="Masukkan password">
                        </div>
                        <button type="submit"
                            class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-300 focus:outline-none transition">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Format Input
        document.getElementById('no_hp').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        document.getElementById('tanggal_lahir').addEventListener('input', function (e) {
            const inputDate = new Date(this.value);
            const today = new Date();
            if (inputDate > today) {
                this.setCustomValidity('Masukan tanggal lahir dengan benar.');
            } else {
                this.setCustomValidity('');
            }
        });
        document.getElementById('password').addEventListener('input', function (e) {
            if (this.value.length < 8) {
                this.setCustomValidity('Password harus minimal 8 karakter.');
            } else {
                this.setCustomValidity('');
            }
        });
        document.querySelector('form').addEventListener('submit', function (e) {
            const photoInput = document.getElementById('photoInput');
            if (!photoInput.value) {
                e.preventDefault();
                alert('Silakan ambil foto selfie terlebih dahulu.');
            }
        });

        // Kamera dan Capture Selfie
        document.addEventListener('DOMContentLoaded', function () {
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const captureBtn = document.getElementById('captureBtn');
            const photoInput = document.getElementById('photoInput');
            const preview = document.getElementById('preview');
            const cameraContainer = document.getElementById('cameraContainer');
            const previewContainer = document.getElementById('previewContainer');
            const retakeBtn = document.getElementById('retakeBtn');
            let stream = null;

            // Minta akses kamera
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function (s) {
                        stream = s;
                        video.srcObject = stream;
                        video.play();
                    })
                    .catch(function (err) {
                        alert('Tidak dapat mengakses kamera: ' + err);
                    });
            } else {
                alert('Browser tidak mendukung akses kamera.');
            }

            // Tangkap gambar dari video dengan resolusi maksimal 100x100
            captureBtn.addEventListener('click', function () {
                const aspectRatio = video.videoWidth / video.videoHeight;
                let targetWidth = 100;
                let targetHeight = 100;

                if (aspectRatio > 1) {
                    targetHeight = Math.round(100 / aspectRatio);
                } else {
                    targetWidth = Math.round(100 * aspectRatio);
                }

                canvas.width = targetWidth;
                canvas.height = targetHeight;
                canvas.getContext('2d').drawImage(video, 0, 0, targetWidth, targetHeight);
                const dataUrl = canvas.toDataURL('image/png');
                photoInput.value = dataUrl;
                preview.src = dataUrl;

                // Hide camera, show preview
                cameraContainer.classList.add('hidden');
                previewContainer.classList.remove('hidden');
            });

            // Ambil ulang gambar
            retakeBtn.addEventListener('click', function () {
                previewContainer.classList.add('hidden');
                cameraContainer.classList.remove('hidden');
                photoInput.value = '';
                preview.src = '';
            });

            // Optional: stop camera when leaving page
            window.addEventListener('beforeunload', function () {
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                }
            });
        });
    </script>
</body>
</html>
