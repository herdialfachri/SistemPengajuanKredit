<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// app/Models/Penyetujuan.php
class Penyetujuan extends Model
{
    use HasFactory;

    protected $fillable = ['pengajuan_id', 'pimpinan_id', 'status', 'catatan', 'tanggal_persetujuan'];

    public function pengajuan() {
        return $this->belongsTo(Pengajuan::class);
    }

    public function pimpinan() {
        return $this->belongsTo(User::class, 'pimpinan_id');
    }
}
