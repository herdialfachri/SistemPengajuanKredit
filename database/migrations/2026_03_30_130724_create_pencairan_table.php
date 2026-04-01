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
        Schema::create('pencairan', function (Blueprint $table) {
            $table->id();

            // pengajuan yang diajukan
            $table->foreignId('pengajuan_id')
                  ->constrained('pengajuan')
                  ->cascadeOnDelete()
                  ->index()
                  ->name('pencairan_pengajuan_fk');

            // admin yang melakukan pencairan
            $table->foreignId('admin_id')
                  ->constrained('users')
                  ->cascadeOnDelete()
                  ->index()
                  ->name('pencairan_admin_fk');

            $table->decimal('jumlah_cair', 15, 2)->index();
            $table->date('tanggal_cair')->index();
            $table->text('catatan')->nullable();
            $table->string('dokumentasi'); // misalnya foto admin/marketing dengan nasabah
            $table->string('dokumen_pendukung'); // misalnya bukti transfer

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencairan');
    }
};