<x-layout>
    <div class="container mx-auto px-4 py-8 max-w-5xl">

        <div class="mb-8">
            <a href="{{ route('profile') }}#experiences"
                class="inline-flex items-center text-blue-600 hover:underline font-semibold text-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Profil
            </a>
        </div>

        <section class="flex flex-col md:flex-row gap-8 items-center md:items-start mb-12">
            <div class="shrink-0 w-full md:w-[350px]">
                <img src="{{ asset($event->img_path) }}" alt="{{ $event->title }}"
                    class="w-full h-[250px] rounded-lg object-cover border border-gray-200 shadow-sm">
            </div>
            <div class="text-center md:text-left pt-2 flex-1">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $event->title }}</h1>
                <p class="text-gray-700 text-lg mb-4">
                    <strong class="font-semibold text-gray-900">Tanggal :</strong>
                    {{ $event->date->format('d F Y') }}
                </p>

                @if($event->url)
                    <div class="mt-6">
                        <a href="{{ $event->url }}" target="_blank" rel="noopener noreferrer"
                            class="inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition-colors shadow-sm">
                            Tautan Terkait
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-4 text-gray-800 border-b pb-2">Deskripsi Kegiatan</h2>
            <div class="text-gray-700 text-lg leading-relaxed whitespace-pre-wrap">
                {{ $event->description }}
            </div>
        </section>

    </div>
</x-layout>