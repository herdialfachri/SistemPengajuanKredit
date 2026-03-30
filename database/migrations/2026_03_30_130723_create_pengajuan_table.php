<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ao_id')->constrained('users')->cascadeOnDelete();

            $table->text('alamat_sekarang');
            $table->text('agunan');
            $table->string('profesi', 100);

            $table->decimal('jumlah_plafon', 15, 2);
            $table->decimal('taksasi', 15, 2);

            $table->text('tujuan_pengajuan');
            $table->string('dokumen_pendukung');

            $table->enum('status', [
                'menunggu',
                'dokumen_tidak_lengkap',
                'verifikasi',
                'menunggu_persetujuan',
                'disetujui',
                'ditolak',
                'dicairkan'
            ])->default('menunggu');

            $table->date('tanggal_pengajuan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
