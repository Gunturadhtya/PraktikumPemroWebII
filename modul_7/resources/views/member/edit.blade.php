<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white max-w-xl mx-auto overflow-hidden shadow-sm sm:rounded-lg p-6 sm:p-8">
                <form method="POST" action="{{ route('member.update', $member->id_member) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="nama_member" :value="__('Nama Member')" />
                        <x-text-input id="nama_member" class="block mt-1 w-full" type="text" name="nama_member" :value="old('nama_member', $member->nama_member)" required autofocus />
                        <x-input-error :messages="$errors->get('nama_member')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="nomor_member" :value="__('Nomor Member')" />
                        <x-text-input id="nomor_member" class="block mt-1 w-full" type="text" name="nomor_member" :value="old('nomor_member', $member->nomor_member)" required />
                        <x-input-error :messages="$errors->get('nomor_member')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="alamat" :value="__('Alamat')" />
                        <textarea id="alamat" name="alamat" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="3">{{ old('alamat', $member->alamat) }}</textarea>
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="tgl_mendaftar" :value="__('Tanggal Mendaftar')" />
                        <x-text-input id="tgl_mendaftar" class="block mt-1 w-full" type="datetime-local" name="tgl_mendaftar" :value="old('tgl_mendaftar', $member->tgl_mendaftar->format('Y-m-d\TH:i'))" required />
                        <x-input-error :messages="$errors->get('tgl_mendaftar')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="tgl_terakhir_bayar" :value="__('Tanggal Terakhir Bayar')" />
                        <x-text-input id="tgl_terakhir_bayar" class="block mt-1 w-full" type="date" name="tgl_terakhir_bayar" :value="old('tgl_terakhir_bayar', $member->tgl_terakhir_bayar ? $member->tgl_terakhir_bayar->format('Y-m-d') : '')" />
                        <x-input-error :messages="$errors->get('tgl_terakhir_bayar')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4 mt-6">
                        <x-primary-button>
                            {{ __('Update') }}
                        </x-primary-button>
                        <a href="{{ route('member.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Batal') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>