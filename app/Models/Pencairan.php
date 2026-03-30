<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Pencairan.php
class Pencairan extends Model
{
    use HasFactory;

    protected $fillable = ['pengajuan_id', 'admin_id', 'jumlah_cair', 'tanggal_cair', 'catatan'];

    public function pengajuan() {
        return $this->belongsTo(Pengajuan::class);
    }

    public function admin() {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
