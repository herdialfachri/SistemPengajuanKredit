<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'email',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_perkawinan',
        'pekerjaan',
        'alamat',
        'password',
        'role'
    ];

    // Relasi ke pengajuan sebagai nasabah
    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'user_id', 'id');
    }

    // Relasi ke pengajuan sebagai marketing
    public function referralPengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'referral_id', 'id');
    }

    // Relasi ke pengajuan sebagai pimpinan
    public function approvePengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'approve_id', 'id');
    }

    // Relasi ke pencairan sebagai admin
    public function pencairan()
    {
        return $this->hasMany(Pencairan::class, 'admin_id', 'id');
    }
}
