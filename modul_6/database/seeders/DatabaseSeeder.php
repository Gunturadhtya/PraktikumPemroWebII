<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['nim' => '2410817310003'], 
            [
                'name' => 'Muhammad Guntur Ricky Adhitya',
                'img_path' => '/images/profile-placeholder.jpg',
                'major' => 'Teknologi Informasi',
            ]
        );

        $gameseed = Event::firstOrCreate(
            ['title' => 'TOP 10 GAMESEED 2025'],
            [
                'img_path' => '/images/event-placeholder.jpg',
                'description' => 'Placeholder Description',
                'url' => 'https://wasakagames.itch.io/a-match-made-in-dungeon',
                'date' => Carbon::create(2025, 9, 15),
            ]
        );

        $biScholarship = Event::firstOrCreate(
            ['title' => 'Wawancara Beasiswa Bank Indonesia'],
            [
                'img_path' => '/images/event-placeholder.jpg',
                'description' => 'Placeholder Description',
                'url' => null,
                'date' => Carbon::create(2026, 4, 10),
            ]
        );

        $wasakaRobotik = Event::firstOrCreate(
            ['title' => 'Wawancara Wasaka Robotik oleh SCTV Kalimantan Selatan'],
            [
                'img_path' => '/images/event-placeholder.jpg',
                'description' => 'Placeholder Description',
                'url' => 'https://youtu.be/QgsHeq1Ls8k?si=882eDbV-6C-fediF',
                'date' => Carbon::create(2026, 1, 20),
            ]
        );

        $wsCtf = Event::firstOrCreate(
            ['title' => 'Workshop Capture The Flag PSTI'],
            [
                'img_path' => '/images/event-placeholder.jpg',
                'description' => 'Placeholder Description',
                'url' => null,
                'date' => Carbon::create(2026, 1, 20),
            ]
        );

        $user->events()->syncWithoutDetaching([
            $gameseed->id,
            $biScholarship->id,
            $wasakaRobotik->id,
            $wsCtf->id
        ]);

        if ($user->skills()->count() === 0) {
            $user->skills()->createMany([
                [
                    'name' => 'Bahasa Pemrograman Java',
                    'description' => 'Placeholder Description',
                ],
                [
                    'name' => 'Bahasa Pemrograman C++',
                    'description' => 'Placeholder Description',
                ],
                [
                    'name' => 'Linux',
                    'description' => 'Placeholder Description',
                ],
                [
                    'name'=> 'Bahasa Assembly',
                    'description'=> 'Placeholder Description',
                ],
                [
                    'name'=> 'Reverse Engineering',
                    'description'=> 'Placeholder Description',
                ]
            ]);
        }

        if ($user->hobbies()->count() === 0) {
            $user->hobbies()->createMany([
                [
                    'name' => 'Competitive Programming',
                    'description' => 'Placeholder Description',
                ],
                [
                    'name' => 'Capture The Flag, PWN(Binary Exploitation)',
                    'description' => 'Placeholder Description',
                ],
                [
                    'name' => 'Doom Scrolling',
                    'description' => 'Placeholder Description',
                ],
            ]);
        }
    }
}