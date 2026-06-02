<x-layout>
    <div id="scroll-container"
        class="container mx-auto px-4 max-w-5xl h-[calc(100vh-6rem)] overflow-y-auto snap-y snap-mandatory scroll-smooth hide-scrollbar relative">

        <section id="profile" class="snap-start min-h-full flex flex-col md:flex-row gap-6 items-center justify-center">
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

        <section id="skills"
            class="snap-start min-h-full flex flex-col md:flex-row gap-10 items-center justify-center py-8">
            <div class="flex-1 w-full">
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
        </section>

        <section id="hobbies"
            class="snap-start min-h-full flex flex-col md:flex-row gap-10 items-center justify-center py-8">
            <div class="flex-1 w-full">
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

        <section id="experiences" class="snap-start min-h-full flex flex-col justify-center py-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 w-full">Pengalaman Paling Berkesan</h2>
            @if($user->events->isEmpty())
                <p class="text-gray-500 italic">Belum ada pengalaman kuliah yang tercatat.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full">
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
                                        {{ $event->title }}
                                    </h3>
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

    <button id="snap-next-btn"
        class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50 bg-white hover:bg-gray-50 text-blue-600 p-3 rounded-full shadow-lg border border-gray-100 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 animate-bounce cursor-pointer"
        aria-label="Scroll ke halaman berikutnya">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
        </svg>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('scroll-container');
            const button = document.getElementById('snap-next-btn');
            if (!container || !button) return;

            const sections = container.querySelectorAll('section');

            button.addEventListener('click', () => {
                const containerTop = container.getBoundingClientRect().top;

                const currentSection = Array.from(sections).find(section => {
                    const rect = section.getBoundingClientRect();
                    return Math.abs(rect.top - containerTop) < 10;
                });

                if (currentSection) {
                    const nextSection = currentSection.nextElementSibling;
                    if (nextSection && nextSection.tagName === 'SECTION') {
                        nextSection.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            });

            const observerOptions = {
                root: container,
                threshold: 0.6
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (entry.target === sections[sections.length - 1]) {
                            button.classList.add('opacity-0', 'pointer-events-none');
                        } else {
                            button.classList.remove('opacity-0', 'pointer-events-none');
                        }
                    }
                });
            }, observerOptions);

            sections.forEach(section => observer.observe(section));
        });
    </script>
</x-layout>