<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ao_id',
        'alamat_sekarang',
        'agunan',
        'profesi',
        'jumlah_plafon',
        'taksasi',
        'tujuan_pengajuan',
        'dokumen_pendukung',
        'status',
        'tanggal_pengajuan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ao()
    {
        return $this->belongsTo(User::class, 'ao_id');
    }

    public function logs()
    {
        return $this->hasMany(PengajuanLog::class);
    }

    public function pencairan()
    {
        return $this->hasOne(Pencairan::class);
    }

    public function penyetujuan()
    {
        return $this->hasOne(Penyetujuan::class);
    }
}