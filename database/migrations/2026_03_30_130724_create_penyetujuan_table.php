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
        Schema::create('penyetujuan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pengajuan_id')->constrained('pengajuan')->cascadeOnDelete();
            $table->foreignId('pimpinan_id')->constrained('users')->cascadeOnDelete();

            $table->enum('status', ['disetujui', 'ditolak']);
            $table->text('catatan')->nullable();

            $table->timestamp('tanggal_persetujuan');

            $table->timestamps();
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
