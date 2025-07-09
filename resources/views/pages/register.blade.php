<x-layout.register>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
            {{-- Error --}}
            <x-auth.errormessages />

            {{-- Form Register --}}
            <x-auth.formregister />

            <div class="flex justify-center">
                <a href="{{ route('login.index') }}" class="items-center mt-4 inline-block text-sm text-blue-600 hover:underline">
                    Sudah punya akun? Masuk sekarang
                </a>
            </div>
        </div>
    </div>
</x-layout.register>
