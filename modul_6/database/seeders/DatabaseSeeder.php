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
                'img_path' => '/images/profile.jpeg',
                'major' => 'Teknologi Informasi',
            ]
        );

        $gameseed = Event::firstOrCreate(
            ['title' => 'TOP 10 GAMESEED 2025'],
            [
                'img_path' => '/images/wasaka.jpeg',
                'description' => 'pertama kali lolos final lomba, tidak diduga loh padahal cuma coba-coba saja, tapi sayangnya gugur di pitching game',
                'url' => 'https://wasakagames.itch.io/a-match-made-in-dungeon',
                'date' => Carbon::create(2025, 9, 15),
            ]
        );

        $biScholarship = Event::firstOrCreate(
            ['title' => 'Wawancara Beasiswa Bank Indonesia'],
            [
                'img_path' => '/images/genbi.jpeg',
                'description' => 'keluar dari zona nyaman dan alhamdulillah lolos, GACOR',
                'url' => null,
                'date' => Carbon::create(2025, 9, 10),
            ]
        );

        $wasakaRobotik = Event::firstOrCreate(
            ['title' => 'Wawancara Wasaka Robotik oleh SCTV Kalimantan Selatan'],
            [
                'img_path' => '/images/sctv.png',
                'description' => 'gak nyangka tiba-tiba diwawancarai oleh SCTV, jujur gugup pas para dekan dan wakil dekan ikut nanya juga',
                'url' => 'https://youtu.be/QgsHeq1Ls8k?si=882eDbV-6C-fediF',
                'date' => Carbon::create(2026, 11, 29),
            ]
        );

        $wsCtf = Event::firstOrCreate(
            ['title' => 'Workshop Capture The Flag PSTI'],
            [
                'img_path' => '/images/ctf.jpeg',
                'description' => 'akhirnya kesampean juga minat CTF, dari maba saya ingin nyoba CTF tapi karna bingung ngapain aja (karena kategorinya banyak) jadi, pindah haluan ke Competitive Programming',
                'url' => null,
                'date' => Carbon::create(2026, 6, 13),
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
                    'name' => 'Bahasa Pemrograman Imperative',
                    'description' => 'Bisa membaca dan memahami semua bahasa pemrograman yang mendukung paradigma Imperative seperti C++, Java, atau Kotlin',
                ],
                [
                    'name' => 'Linux',
                    'description' => 'Menggunakan Linux sebagai OS sehari-hari',
                ],
                [
                    'name'=> 'Bahasa Assembly',
                    'description'=> 'Bisa membaca dan membuat program dari bahasa assembly, khusus di linux saja',
                ],
                [
                    'name'=> 'Reverse Engineering',
                    'description'=> 'Bisa melakukan patching, konversi ke bahasa pemrograman atau melakukan binary exploitation',
                ]
            ]);
        }

        if ($user->hobbies()->count() === 0) {
            $user->hobbies()->createMany([
                [
                    'name' => 'Competitive Programming',
                    'description' => 'Tiap minggu pasti gawe soal Dynamic Programming',
                ],
                [
                    'name' => 'Capture The Flag, PWN(Binary Exploitation)',
                    'description' => 'Tiap pagi gawe CTF, tapi masih dalam masa belajar',
                ],
                [
                    'name' => 'Doom Scrolling',
                    'description' => 'Tiap hari menjadi professional doom scroller dengan jam terbang minimal 100 jam perbulan',
                ],
            ]);
        }
    }
}