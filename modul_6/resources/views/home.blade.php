<x-layout>
    <div class="flex items-center justify-center w-full">
        <section class="flex flex-col md:flex-col gap-6 items-center md:items-center">
            <div class="shrink-0">
                <img src="{{ asset($user->img_path) }}" alt="{{ $user->name }}"
                    class="w-[150px] h-[150px] rounded-full object-cover border border-gray-200 shadow-sm">
            </div>
            <div class="text-center md:text-left pt-2">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $user->name }}</h1>
                <p class="text-gray-700 text-lg text-center">
                    {{ $user->nim }}
                </p>
            </div>
        </section>

    </div>
</x-layout>