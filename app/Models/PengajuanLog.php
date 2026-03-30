<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// app/Models/PengajuanLog.php
class PengajuanLog extends Model
{
    use HasFactory;

    protected $fillable = ['pengajuan_id', 'status', 'keterangan'];

    public function pengajuan() {
        return $this->belongsTo(Pengajuan::class);
    }
}
