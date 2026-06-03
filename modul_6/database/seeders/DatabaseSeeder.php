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
                'description' => "Pencapaian ini menjadi momen yang sangat berkesan karena ini adalah pertama kalinya berhasil menembus babak final dalam sebuah perlombaan berskala besar. Awalnya, partisipasi dalam ajang GAMESEED 2025 ini benar-benar hanya sekadar coba-coba untuk menguji kemampuan pengembangan game lewat karya 'A Match Made in Dungeon', sehingga lolos ke jajaran TOP 10 adalah sebuah kejutan yang luar biasa menyenangkan.\n\nNamun, perjalanan manis tersebut harus terhenti di tahap pitching game. Kurangnya jam terbang dalam mempresentasikan dan menjual ide di hadapan para juri membuat tim harus menerima kenyataan untuk gugur di fase krusial ini. Meskipun sayangnya harus tereliminasi, kegagalan ini memberikan pelajaran berharga mengenai pentingnya kemampuan komunikasi di dunia industri kreatif.",
                'url' => 'https://wasakagames.itch.io/a-match-made-in-dungeon',
                'date' => Carbon::create(2025, 9, 15),
            ]
        );

        $biScholarship = Event::firstOrCreate(
            ['title' => 'Wawancara Beasiswa Bank Indonesia'],
            [
                'img_path' => '/images/genbi.jpeg',
                'description' => "Keputusan untuk mendaftar Beasiswa Bank Indonesia ini merupakan salah satu langkah terbesar untuk berani menantang diri sendiri dan keluar dari zona nyaman. Mengikuti seleksi beasiswa bergengsi tentu membutuhkan persiapan mental yang tidak sedikit, terutama saat harus berhadapan langsung dengan para pewawancara untuk meyakinkan mereka mengenai kelayakan diri.\n\nAlhamdulillah, semua usaha untuk mendobrak batasan diri tersebut membuahkan hasil yang sangat luar biasa, benar-benar GACOR! Lolos seleksi ini tidak hanya menjadi pembuktian atas kemampuan diri, tetapi juga membuka peluang besar untuk terus berkembang dan berkontribusi lebih luas melalui komunitas GenBI ke depannya.",
                'url' => null,
                'date' => Carbon::create(2026, 4, 24),
            ]
        );

        $wasakaRobotik = Event::firstOrCreate(
            ['title' => 'Wawancara Wasaka Robotik oleh SCTV Kalimantan Selatan'],
            [
                'img_path' => '/images/sctv.png',
                'description' => "Momen peliputan oleh SCTV Kalimantan Selatan ini terjadi begitu tak terduga dan menjadi salah satu pengalaman yang paling mendebarkan. Sama sekali tidak menyangka bahwa riset dan kegiatan yang dilakukan bersama tim Wasaka Robotik akan mendapat sorotan dari stasiun televisi, sehingga persiapan wawancara pun dilakukan dengan sangat spontan.\n\nKetegangan semakin memuncak ketika sesi wawancara berlangsung, karena secara mengejutkan para jajaran dekan dan wakil dekan turut hadir dan ikut memberikan pertanyaan teknis di depan kamera. Walaupun jujur sangat gugup saat harus menjawab rentetan pertanyaan tersebut, momen ini pada akhirnya menjadi kebanggaan tersendiri karena bisa menunjukkan karya robotik secara langsung.",
                'url' => 'https://youtu.be/QgsHeq1Ls8k?si=882eDbV-6C-fediF',
                'date' => Carbon::create(2025, 11, 29),
            ]
        );

        $wsCtf = Event::firstOrCreate(
            ['title' => 'Workshop Capture The Flag PSTI'],
            [
                'img_path' => '/images/ctf.jpeg',
                'description' => "Mengikuti Workshop Capture The Flag (CTF) yang diadakan oleh PSTI ini rasanya seperti menuntaskan rasa penasaran yang sudah terpendam sejak lama. Sejak masih berstatus mahasiswa baru, ada minat yang kuat terhadap dunia keamanan siber dan sangat ingin mencoba bermain CTF, namun terhalang oleh kebingungan karena banyaknya kategori yang harus dipelajari seperti Web, Crypto, hingga Pwn.\n\nKarena rasa bingung tidak tahu harus mulai dari mana saat maba tersebut, haluan akhirnya diputar untuk lebih fokus mendalami Competitive Programming guna mengasah logika algoritma. Kini, melalui workshop ini, akhirnya ada wadah dan arahan yang jelas untuk kembali menyalurkan minat awal terhadap CTF dengan pendekatan yang lebih terstruktur.",
                'url' => null,
                'date' => Carbon::create(2026, 5, 13),
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