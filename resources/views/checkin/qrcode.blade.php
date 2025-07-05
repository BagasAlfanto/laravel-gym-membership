<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')

    <title>Qr Code</title>

    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1593079831268-3381b0db4a77?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: brightness(0.5);
        }

        .card-container {
            perspective: 1000px;
            /* kedalaman 3D */
        }

        .card {
            position: relative;
            width: 200px;
            height: 300px;
            transform-style: preserve-3d;
            /* penting untuk flip */
            transition: transform 0.6s;
            /* animasi halus */
        }

        .front,
        .back {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 8px;
            backface-visibility: hidden;
            /* sembunyikan sisi belakang */
            top: 0;
            left: 0;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .back {
            transform: rotateY(180deg);
            /* balik agar muncul saat di‑flip */
        }

        /* dipicu via JS */
        .card.flipped {
            transform: rotateY(180deg);
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="mx-auto w-full max-w-sm rounded-xl bg-white p-6 shadow-lg outline outline-black/5">
        <div class="w-full flex flex-col items-center">
            <div class="card-container mb-4">
                <div class="card">
                    <div class="front">
                        <img src="https://i.pinimg.com/736x/49/27/bd/4927bd8ba9f3c281ba366eded4d11fd8.jpg"
                            alt="Profile Image" class="w-42 h-42 mx-auto mb-4 shadow-md border-4 border-gray-200" />
                    </div>
                    <div class="back">
                        <img src="https://i.pinimg.com/736x/90/98/31/90983103e9f414d15596a6b7bf6a1ea5.jpg"
                            alt="Profile Image" class="w-42 h-42 mx-auto mb-4 shadow-md border-4 border-gray-200" />
                    </div>
                </div>
            </div>
            <h1 class="text-center font-bold text-xl mb-1">Bagas Alfanto</h1>
            <p class="text-center text-gray-600 text-sm mb-4">No HP: 123456789</p>

            <div class="w-full bg-gray-50 rounded-lg p-4 mb-4 shadow-inner">
                <div class="flex justify-between text-sm mb-1">
                    <span class="font-medium text-gray-700">Membership</span>
                    <span class="text-gray-600">10 Jan 2025 – 10 Jan 2026</span>
                </div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="font-medium text-gray-700">Package</span>
                    <span class="text-gray-600">Member Corporate</span>
                </div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="font-medium text-gray-700">Active Period</span>
                    <span class="text-gray-600">(17 Jun – 17 Jul 2025)</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="font-medium text-gray-700">Quota Private Trainer</span>
                    <span class="text-gray-600">0</span>
                </div>
            </div>

            <button id="profile-btn"
                class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg shadow
                     hover:bg-blue-700 transition text-sm focus:outline-none">
                Profile
            </button>

        </div>
    </div>

    <script>
        document.getElementById('profile-btn').addEventListener('click', () => {
            document.querySelector('.card').classList.toggle('flipped');
        });
    </script>
</body>

</html>
