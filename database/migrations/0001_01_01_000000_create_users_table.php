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

            //identitas 1
            $table->string('nik', 20)->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            //identitas 2
            $table->string('no_hp', 20);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');

            //identitas 3
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('status_perkawinan');
            $table->string('pekerjaan');

            //identitas 4
            $table->string('alamat', 255);

            //kata sandi
            $table->string('password');

            //sistem peran atau role
            $table->enum('role', ['nasabah', 'marketing', 'pimpinan', 'admin'])->default('nasabah');
            $table->timestamps();
        });

        // Tabel sessions (buat session database)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('payload');
            $table->integer('last_activity');
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
