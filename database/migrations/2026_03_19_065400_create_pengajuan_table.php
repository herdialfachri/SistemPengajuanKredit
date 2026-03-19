<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();

            // sementara tanpa FK users
            $table->unsignedBigInteger('user_id'); // nasabah
            $table->unsignedBigInteger('ao_id'); // referensi account officer

            $table->text('alamat_sekarang');
            $table->text('agunan');
            $table->string('profesi', 100);
            $table->decimal('jumlah_plafon', 15, 2);
            $table->decimal('taksasi', 15, 2);
            $table->text('tujuan_pengajuan');
            $table->string('dokumen_pendukung', 255); // path ke dokumen pendukung

            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])
                ->default('menunggu');

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
