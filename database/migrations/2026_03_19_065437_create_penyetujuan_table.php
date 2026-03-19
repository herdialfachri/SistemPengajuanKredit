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
    Schema::create('penyetujuan', function (Blueprint $table) {
        $table->id();

        $table->foreignId('pengajuan_id')
              ->constrained('pengajuan')
              ->cascadeOnDelete();

        // sementara tanpa FK ke users
        $table->unsignedBigInteger('pimpinan_id');

        $table->enum('status', ['disetujui', 'ditolak']);
        $table->text('catatan');

        $table->timestamp('tanggal_persetujuan');

        $table->timestamps();

        // 1 pengajuan hanya 1 approval
        $table->unique('pengajuan_id');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyetujuan');
    }
};
