<x-layout>
    <div class="container mx-auto px-4 py-8 max-w-5xl">

        <section class="flex flex-col md:flex-row gap-6 items-center md:items-start mb-10">
            <div class="shrink-0">
                <img src="{{ asset($user->img_path) }}" alt="{{ $user->name }}"
                    class="w-[150px] h-[150px] rounded-full object-cover border border-gray-200 shadow-sm">
            </div>
            <div class="text-center md:text-left pt-2">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $user->name }}</h1>
                <p class="text-gray-700 text-lg"><strong class="font-semibold text-gray-900">NIM:</strong>
                    {{ $user->nim }}</p>
                <p class="text-gray-700 text-lg"><strong class="font-semibold text-gray-900">Asal Prodi:</strong>
                    {{ $user->major }}</p>
            </div>
        </section>

        <section class="flex flex-col md:flex-row gap-10 mb-12">
            <div class="flex-1">
                <h2 class="text-2xl font-bold mb-4 text-gray-800 border-b pb-2">Skill</h2>
                @if($user->skills->isEmpty())
                    <p class="text-gray-500 italic">Belum ada skill yang ditambahkan.</p>
                @else
                    <ul class="space-y-3">
                        @foreach($user->skills as $skill)
                            <li class="text-gray-700">
                                <strong class="text-gray-900">{{ $skill->name }}</strong>: {{ $skill->description }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="flex-1">
                <h2 class="text-2xl font-bold mb-4 text-gray-800 border-b pb-2">Hobi</h2>
                @if($user->hobbies->isEmpty())
                    <p class="text-gray-500 italic">Belum ada hobi yang ditambahkan.</p>
                @else
                    <ul class="space-y-3">
                        @foreach($user->hobbies as $hobby)
                            <li class="text-gray-700">
                                <strong class="text-gray-900">{{ $hobby->name }}</strong>: {{ $hobby->description }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Pengalaman Paling Berkesan</h2>
            @if($user->events->isEmpty())
                <p class="text-gray-500 italic">Belum ada pengalaman kuliah yang tercatat.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($user->events as $event)
                        <a href="{{ route('experience.show', $event->id) }}"
                            class="group block h-full focus:outline-none rounded-lg">
                            <div
                                class="flex flex-col border border-gray-200 rounded-lg overflow-hidden h-full transition duration-200 ease-in-out shadow-sm group-hover:shadow-md group-hover:-translate-y-1 bg-white">
                                <img src="{{ asset($event->img_path) }}" alt="{{ $event->title }}"
                                    class="w-full h-[150px] object-cover">
                                <div class="p-4 flex flex-col flex-grow">
                                    <h3
                                        class="text-lg font-bold text-gray-900 mt-0 group-hover:text-blue-600 transition-colors">
                                        {{ $event->title }}</h3>
                                    <span class="text-sm text-gray-500 mt-1 mb-2">{{ $event->date->format('d M Y') }}</span>
                                    <p class="text-sm text-gray-700 line-clamp-3">
                                        {{ $event->description }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
</x-layout>