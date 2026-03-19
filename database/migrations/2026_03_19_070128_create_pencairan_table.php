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
        Schema::create('pencairan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pengajuan_id')
                ->constrained('pengajuan')
                ->cascadeOnDelete();

            // sementara tanpa FK ke users
            $table->unsignedBigInteger('admin_id');

            $table->decimal('jumlah_cair', 15, 2);
            $table->date('tanggal_cair');

            $table->text('catatan');

            $table->timestamps();

            // 1 pengajuan hanya bisa dicairkan 1x
            $table->unique('pengajuan_id');
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
