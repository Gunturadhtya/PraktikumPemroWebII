<x-layout>
    <div class="profile-container">
        <section class="profile-header" style="display: flex; gap: 20px; align-items: center; margin-bottom: 30px;">
            <div class="profile-avatar">
                <img src="{{ asset($user->img_path) }}" alt="{{ $user->name }}"
                    style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
            </div>
            <div class="profile-info">
                <h1>{{ $user->name }}</h1>
                <p><strong>NIM:</strong> {{ $user->nim }}</p>
                <p><strong>Asal Prodi:</strong> {{ $user->major }}</p>
            </div>
        </section>

        <section class="profile-details" style="display: flex; gap: 40px; margin-bottom: 40px;">
            <div class="skills-section" style="flex: 1;">
                <h2>Skill</h2>
                @if($user->skills->isEmpty())
                    <p>Belum ada skill yang ditambahkan.</p>
                @else
                    <ul>
                        @foreach($user->skills as $skill)
                            <li>
                                <strong>{{ $skill->name }}</strong>: {{ $skill->description }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="hobbies-section" style="flex: 1;">
                <h2>Hobi</h2>
                @if($user->hobbies->isEmpty())
                    <p>Belum ada hobi yang ditambahkan.</p>
                @else
                    <ul>
                        @foreach($user->hobbies as $hobby)
                            <li>
                                <strong>{{ $hobby->name }}</strong>: {{ $hobby->description }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>

        <section class="experiences-section">
            <h2>Pengalaman Paling Berkesan</h2>
            @if($user->events->isEmpty())
                <p>Belum ada pengalaman kuliah yang tercatat.</p>
            @else
                <div class="experience-grid"
                    style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
                    @foreach($user->events as $event)
                        <a href="{{ route('experience.show', $event->id) }}" class="card-link"
                            style="text-decoration: none; color: inherit;">
                            <div class="card"
                                style="border: 1px solid #ccc; border-radius: 8px; overflow: hidden; height: 100%; transition: transform 0.2s; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                <img src="{{ asset($event->img_path) }}" alt="{{ $event->title }}"
                                    style="width: 100%; height: 150px; object-fit: cover;">
                                <div class="card-body" style="padding: 15px;">
                                    <h3 style="margin-top: 0; font-size: 1.2rem;">{{ $event->title }}</h3>
                                    <span style="font-size: 0.85rem; color: #666;">{{ $event->date->format('d M Y') }}</span>
                                    <p
                                        style="font-size: 0.9rem; margin-top: 10px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
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