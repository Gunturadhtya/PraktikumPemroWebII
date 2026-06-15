<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex-1 flex items-center justify-center">
        <div class="bg-white/95 rounded-2xl shadow-xl p-8 max-w-4xl w-full">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                
                <div class="w-full md:w-1/4 text-center">
                    <img src="{{ asset('assets/book_icon.jpg') }}" alt="Logo Buku" class="mx-auto rounded-lg shadow-md max-h-36 object-cover">
                </div>
                
                <div class="w-full md:w-1/2 text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang</h2>
                    <p class="text-gray-600">Sistem Informasi Manajemen Perpustakaan Guntur</p>
                </div>
                
                <div class="w-full md:w-1/4 flex flex-col gap-4">
                    <a href="{{ route('member.index') }}" class="w-full bg-gray-800 text-white text-center py-3 rounded-lg hover:bg-gray-700 transition font-semibold shadow-sm">
                        Member
                    </a>
                    <a href="{{ route('buku.index') }}" class="w-full bg-gray-800 text-white text-center py-3 rounded-lg hover:bg-gray-700 transition font-semibold shadow-sm">
                        Buku
                    </a>
                    <a href="{{ route('peminjaman.index') }}" class="w-full bg-gray-800 text-white text-center py-3 rounded-lg hover:bg-gray-700 transition font-semibold shadow-sm">
                        Peminjaman
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full bg-red-600 text-white text-center py-3 rounded-lg hover:bg-red-500 transition font-semibold shadow-sm">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>