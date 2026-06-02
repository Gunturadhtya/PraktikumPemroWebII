<x-layout>
    <div class="flex items-center justify-center w-full">
        <section class="flex flex-col gap-6 items-center">
            <div class="shrink-0">
                <a href="{{ route('profile') }}"
                    class="inline-block rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-transform"
                    aria-label="Lihat profil lengkap {{ $user->name }}">

                    <img src="{{ asset($user->img_path) }}" alt="{{ $user->name }}"
                        class="w-[150px] h-[150px] rounded-full object-cover border border-gray-200 shadow-sm cursor-pointer transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-md hover:border-blue-400">

                </a>
            </div>
            <div class="text-center pt-2">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $user->name }}</h1>
                <p class="text-gray-700 text-lg text-center">
                    {{ $user->nim }}
                </p>
            </div>
        </section>
    </div>
</x-layout>