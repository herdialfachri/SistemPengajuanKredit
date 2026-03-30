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
        // Tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // basic
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // role system
            $table->enum('role', ['nasabah', 'ao', 'pimpinan', 'admin'])->default('nasabah');

            // identitas
            $table->string('nik', 20)->unique(); // KTP
            $table->string('no_kk', 20)->nullable();
            $table->string('npwp', 25)->nullable();

            // kontak
            $table->string('no_hp', 20);
            $table->text('alamat');

            // data pribadi
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('status_perkawinan')->nullable();

            // pekerjaan
            $table->string('pekerjaan')->nullable();
            $table->decimal('penghasilan', 15, 2)->nullable();

            // foto & dokumen
            $table->string('foto_ktp')->nullable();
            $table->string('foto_diri')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        // Tabel sessions (buat session database)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
    }
};
