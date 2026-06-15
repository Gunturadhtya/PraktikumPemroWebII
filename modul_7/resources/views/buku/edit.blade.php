<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white max-w-xl mx-auto overflow-hidden shadow-sm sm:rounded-lg p-6 sm:p-8">
                <form method="POST" action="{{ route('buku.update', $buku->id_buku) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="judul_buku" :value="__('Judul Buku')" />
                        <x-text-input id="judul_buku" class="block mt-1 w-full" type="text" name="judul_buku" :value="old('judul_buku', $buku->judul_buku)" required autofocus />
                        <x-input-error :messages="$errors->get('judul_buku')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="penulis" :value="__('Penulis')" />
                        <x-text-input id="penulis" class="block mt-1 w-full" type="text" name="penulis" :value="old('penulis', $buku->penulis)" required />
                        <x-input-error :messages="$errors->get('penulis')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="penerbit" :value="__('Penerbit')" />
                        <x-text-input id="penerbit" class="block mt-1 w-full" type="text" name="penerbit" :value="old('penerbit', $buku->penerbit)" required />
                        <x-input-error :messages="$errors->get('penerbit')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="tahun_terbit" :value="__('Tahun Terbit')" />
                        <x-text-input id="tahun_terbit" class="block mt-1 w-full" type="number" name="tahun_terbit" :value="old('tahun_terbit', $buku->tahun_terbit)" required />
                        <x-input-error :messages="$errors->get('tahun_terbit')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4 mt-6">
                        <x-primary-button>
                            {{ __('Update') }}
                        </x-primary-button>
                        <a href="{{ route('buku.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Batal') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>