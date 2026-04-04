<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

protected $table = 'pengajuan';

    protected $fillable = [
        'user_id',
        'referral_id',
        'approve_id',
        'kode_pengajuan',
        'nik',
        'nama',
        'alamat',
        'profesi',
        'agunan',
        'taksasi',
        'jumlah_plafon',
        'tujuan_pengajuan',
        'dokumen_pendukung',
        'status'
    ];


    // Relasi ke nasabah (user yang mengajukan)
    public function nasabah()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke marketing (referral)
    public function marketing()
    {
        return $this->belongsTo(User::class, 'referral_id');
    }

    // Relasi ke pimpinan (approve)
    public function pimpinan()
    {
        return $this->belongsTo(User::class, 'approve_id');
    }

    // Relasi ke pencairan
    public function pencairan()
    {
        return $this->hasOne(Pencairan::class, 'pengajuan_id');
    }

    // fungsi untuk mendapatkan URL dokumen pendukung
    public function getDokumenPendukungUrlAttribute()
    {
        return $this->dokumen_pendukung 
            ? asset('storage/' . $this->dokumen_pendukung) 
            : null;
    }

    public function referral()
    {
        return $this->belongsTo(User::class, 'referral_id');
    }
}
