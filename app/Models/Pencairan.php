<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    use HasFactory;

    protected $table = 'pencairan';

    protected $fillable = [
        'pengajuan_id',
        'admin_id',
        'jumlah_cair',
        'tanggal_cair',
        'catatan',
        'dokumentasi',
        'dokumen_pendukung',
        'status'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}