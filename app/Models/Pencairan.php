<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajuan_id',
        'admin_id',
        'jumlah_cair',
        'tanggal_cair',
        'catatan',
        'dokumentasi',
        'dokumen_pendukung'
    ];

    // Relasi ke pengajuan
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'id');
    }

    // Relasi ke admin (user)
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
