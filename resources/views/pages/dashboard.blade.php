<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dashboard - Admin</title>
</head>
<body>
<h1>Ini Dashboard</h1>
<a href="{{ route('logout') }}">
    <button type="button" class="mt-2 px-4 py-2 bg-red-600 text-white rounded-lg shadow
        hover:bg-red-700 transition text-sm focus:outline-none">
    Logout
    </button>
</a>
</body>
</html>
