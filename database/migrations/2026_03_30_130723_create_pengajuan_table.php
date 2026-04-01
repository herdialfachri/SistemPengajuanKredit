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

            // user yang buat pengajuan
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete()
                  ->index()
                  ->name('pengajuan_user_fk');

            // user marketing yang mereferensikan
            $table->foreignId('referral_id')
                  ->constrained('users')
                  ->cascadeOnDelete()
                  ->index()
                  ->name('pengajuan_referral_fk');

            // user pimpinan yang menyetujui
            $table->foreignId('approve_id')
                  ->constrained('users')
                  ->cascadeOnDelete()
                  ->index()
                  ->name('pengajuan_approve_fk');

            $table->string('kode_pengajuan')->unique()->index(); // misalnya P100, P101

            $table->string('nik', 20)->unique()->index();
            $table->string('nama')->index();
            $table->string('alamat', 255)->index();
            $table->string('profesi', 100);
            $table->text('agunan');
            $table->decimal('taksasi', 15, 2);
            $table->decimal('jumlah_plafon', 15, 2);
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
            ])->default('menunggu')->index();

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