<form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{-- Camera --}}
        <x-auth.camera/>

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
