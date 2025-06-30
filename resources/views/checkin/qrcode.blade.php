<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  @vite('resources/css/app.css')

  <title>Qr Code</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="mx-auto w-full max-w-sm rounded-xl bg-white p-6 shadow-lg outline outline-black/5">
    <div class="w-full flex flex-col items-center">
      <img
        src="https://i.pinimg.com/736x/49/27/bd/4927bd8ba9f3c281ba366eded4d11fd8.jpg"
        alt="Profile Image"
        class="w-42 h-42 mx-auto mb-4 shadow-md border-4 border-gray-200"
      />

      <h1 class="text-center font-bold text-xl mb-1">Bagas Alfanto</h1>
      <p class="text-center text-gray-600 text-sm mb-4">No HP: 123456789</p>

      <div class="w-full bg-gray-50 rounded-lg p-4 mb-4 shadow-inner">
        <div class="flex justify-between text-sm mb-1">
          <span class="font-medium text-gray-700">Membership</span>
          <span class="text-gray-600">10 Jan 2025 - 10 Jan 2026</span>
        </div>
        <div class="flex justify-between text-sm mb-1">
          <span class="font-medium text-gray-700">Package</span>
          <span class="text-gray-600">Member Corporate</span>
        </div>
        <div class="flex justify-between text-sm mb-1">
          <span class="font-medium text-gray-700">Active Period</span>
          <span class="text-gray-600">(17 Jun - 17 Jul 2025)</span>
        </div>
        <div class="flex justify-between text-sm">
          <span class="font-medium text-gray-700">Quota Private Trainer</span>
          <span class="text-gray-600">0</span>
        </div>
      </div>

      <button class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition text-sm focus:outline-none">
        Profile
      </button>
    </div>
  </div>
</body>
</html>
