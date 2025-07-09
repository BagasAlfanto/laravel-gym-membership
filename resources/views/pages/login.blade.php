<x-layout.login>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md mx-auto">
            <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
            {{-- Error --}}
            <x-auth.errormessages />

            {{-- Form Login --}}
            <x-auth.formlogin />

            <div class="flex justify-center">
                <a href="{{ route('register.index') }}" class="items-center mt-4 inline-block text-sm text-blue-600 hover:underline">
                    Belum punya akun? Daftar sekarang
                </a>
            </div>
        </div>
    </div>
</x-layout.login>
