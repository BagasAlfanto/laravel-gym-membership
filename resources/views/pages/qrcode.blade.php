<x-layout.checkin>
    <div class="mx-auto w-full max-w-sm rounded-xl bg-white p-6 shadow-lg outline outline-black/5">
        <div class="w-full flex flex-col items-center">
            {{-- QR Code --}}
            <x-checkin.qrcode />
            {{-- Detail Membership --}}
            <x-checkin.detail />

            <div class="w-full flex justify-center items-center mt-4 gap-2">
                <button id="profile-btn"
                    class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg shadow
                        hover:bg-blue-700 transition text-sm focus:outline-none">
                    Profile
                </button>

                <a href="{{ route('logout') }}">
                    <button type="button" class="mt-2 px-4 py-2 bg-red-600 text-white rounded-lg shadow
                        hover:bg-red-700 transition text-sm focus:outline-none">
                    Logout
                </button>
                </a>
            </div>
        </div>
    </div>
</x-layout.checkin>
