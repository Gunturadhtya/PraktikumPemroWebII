<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id_member';

    protected $fillable = [
        'nama_member', 'nomor_member', 'alamat', 'tgl_mendaftar', 'tgl_terakhir_bayar'
    ];

    protected function casts(): array
    {
        return [
            'tgl_mendaftar' => 'datetime',
            'tgl_terakhir_bayar' => 'date',
        ];
    }

    public function peminjamans(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'id_member', 'id_member');
    }
}
