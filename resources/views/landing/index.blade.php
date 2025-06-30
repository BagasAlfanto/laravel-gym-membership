<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Gym Gacor</title>
</head>
<body>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <h1>Ini landing Page Sementara</h1>
        <button class="bg-blue-500 text-white px-4 py-2 rounded"><a href="{{ route('login.index') }}">Login</a></button>
        <button class="bg-green-500 text-white px-4 py-2 rounded"><a href="{{ route('register.index') }}">Register</a></button>
    </div>
</body>
</html>
