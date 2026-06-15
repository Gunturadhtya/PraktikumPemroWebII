<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white max-w-xl mx-auto overflow-hidden shadow-sm sm:rounded-lg p-6 sm:p-8">
                <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="id_member" :value="__('Member')" />
                        <select id="id_member" name="id_member" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required autofocus>
                            <option value="" disabled>Pilih Member</option>
                            @foreach($members as $m)
                                <option value="{{ $m->id_member }}" {{ old('id_member', $peminjaman->id_member) == $m->id_member ? 'selected' : '' }}>
                                    {{ $m->nama_member }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_member')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="id_buku" :value="__('Buku')" />
                        <select id="id_buku" name="id_buku" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                            <option value="" disabled>Pilih Buku</option>
                            @foreach($buku as $b)
                                <option value="{{ $b->id_buku }}" {{ old('id_buku', $peminjaman->id_buku) == $b->id_buku ? 'selected' : '' }}>
                                    {{ $b->judul_buku }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_buku')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="tgl_pinjam" :value="__('Tanggal Pinjam')" />
                        <x-text-input id="tgl_pinjam" class="block mt-1 w-full" type="date" name="tgl_pinjam" :value="old('tgl_pinjam', $peminjaman->tgl_pinjam->format('Y-m-d'))" required />
                        <x-input-error :messages="$errors->get('tgl_pinjam')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="tgl_kembali" :value="__('Tanggal Kembali')" />
                        <x-text-input id="tgl_kembali" class="block mt-1 w-full" type="date" name="tgl_kembali" :value="old('tgl_kembali', $peminjaman->tgl_kembali ? $peminjaman->tgl_kembali->format('Y-m-d') : '')" />
                        <x-input-error :messages="$errors->get('tgl_kembali')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4 mt-6">
                        <x-primary-button>
                            {{ __('Update') }}
                        </x-primary-button>
                        <a href="{{ route('peminjaman.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Batal') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>