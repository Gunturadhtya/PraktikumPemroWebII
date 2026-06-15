<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $member = Member::create([
            'nama_member' => 'Andi',
            'nomor_member' => 'M001',
            'alamat' => 'Banjarmasin',
            'tgl_mendaftar' => Carbon::now(),
            'tgl_terakhir_bayar' => Carbon::now(),
        ]);

        $member2 = Member::create([
            'nama_member' => 'Ricky',
            'nomor_member' => 'M002',
            'alamat' => 'Banjarbaru',
            'tgl_mendaftar' => Carbon::now(),
            'tgl_terakhir_bayar' => Carbon::now(),
        ]);

        $buku = Buku::create([
            'judul_buku' => 'Clean Architecture',
            'penulis' => 'Robert C. Martin',
            'penerbit' => 'Prentice Hall',
            'tahun_terbit' => 2017,
        ]);

        Peminjaman::create([
            'id_member' => $member->id_member,
            'id_buku' => $buku->id_buku,
            'tgl_pinjam' => Carbon::now()->subDays(5),
            'tgl_kembali' => null,
        ]);
    } 

}
