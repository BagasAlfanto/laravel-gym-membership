<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    <title>Gym - Login</title>
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
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md mx-auto">
            <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>

            {{-- Error --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Login --}}
            <form action="{{ route('login.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">No HP</label>
                    <input type="tel" id="no_hp" name="no_hp" required
                        class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white focus:outline-none hover:border-indigo-400"
                        placeholder="Masukkan nomor HP">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" required minlength="8"
                        class="mt-1 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:bg-white focus:outline-none hover:border-indigo-400"
                        placeholder="Masukkan password">
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-300 focus:outline-none transition">
                    Login
                </button>
            </form>
        </div>
    </div>
    <script type="module" src="{{ Vite::asset('resources/js/auth/login.js') }}"></script>
</body>

</html>
