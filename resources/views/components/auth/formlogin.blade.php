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
    <button type="submit" id="loginBtn" disabled
        class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-300 focus:outline-none transition opacity-50 cursor-not-allowed">
        Login
    </button>
</form>
