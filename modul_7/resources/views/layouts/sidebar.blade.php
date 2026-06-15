<aside class="w-full md:w-64 bg-[#252d3b] text-white flex flex-col shadow-lg">
    <div class="p-6">
        <h2 class="text-2xl font-bold text-center text-white mb-8">
            Perpustakaan<br>Guntur
        </h2>
        
        <nav class="flex flex-col space-y-2">
            <a href="{{ route('dashboard') }}" 
               class="py-3 px-4 rounded-lg transition duration-200 hover:bg-gray-700 hover:text-white text-[#d0d4dc]">
                Kembali
            </a>

            @if (request()->routeIs('buku.*'))
                <a href="{{ route('buku.create') }}" 
                   class="py-3 px-4 rounded-lg transition duration-200 hover:bg-gray-700 hover:text-white {{ request()->routeIs('buku.create') ? 'bg-gray-700 text-white font-semibold' : 'text-[#d0d4dc]' }}">
                    Tambah Buku
                </a>
            @elseif (request()->routeIs('member.*'))
                <a href="{{ route('member.create') }}" 
                   class="py-3 px-4 rounded-lg transition duration-200 hover:bg-gray-700 hover:text-white {{ request()->routeIs('member.create') ? 'bg-gray-700 text-white font-semibold' : 'text-[#d0d4dc]' }}">
                    Tambah Member
                </a>
            @elseif (request()->routeIs('peminjaman.*'))
                <a href="{{ route('peminjaman.create') }}" 
                   class="py-3 px-4 rounded-lg transition duration-200 hover:bg-gray-700 hover:text-white {{ request()->routeIs('peminjaman.create') ? 'bg-gray-700 text-white font-semibold' : 'text-[#d0d4dc]' }}">
                    Tambah Peminjaman
                </a>
            @endif
        </nav>
    </div>
</aside>