<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Pimpinan
            [
                'nik' => '3201010000000001',
                'nama' => 'Pak Pimpinan',
                'email' => 'pimpinan@example.com',
                'email_verified_at' => now(),
                'no_hp' => '081111111111',
                'tempat_lahir' => 'Sukabumi',
                'tanggal_lahir' => '1980-01-01',
                'jenis_kelamin' => 'laki-laki',
                'status_perkawinan' => 'menikah',
                'pekerjaan' => 'Pimpinan',
                'alamat' => 'Jl. Raya Sukabumi No.1',
                'password' => Hash::make('12345678'),
                'role' => 'pimpinan',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Admin
            [
                'nik' => '3201010000000002',
                'nama' => 'Bu Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'no_hp' => '082222222222',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1990-02-02',
                'jenis_kelamin' => 'perempuan',
                'status_perkawinan' => 'menikah',
                'pekerjaan' => 'Admin',
                'alamat' => 'Jl. Merdeka Bandung',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Marketing
            [
                'nik' => '3201010000000003',
                'nama' => 'Mas Marketing',
                'email' => 'marketing@example.com',
                'email_verified_at' => now(),
                'no_hp' => '083333333333',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1995-03-03',
                'jenis_kelamin' => 'laki-laki',
                'status_perkawinan' => 'belum menikah',
                'pekerjaan' => 'Marketing',
                'alamat' => 'Jl. Sudirman Jakarta',
                'password' => Hash::make('12345678'),
                'role' => 'marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Nasabah
            [
                'nik' => '3201010000000004',
                'nama' => 'Ibu Nasabah',
                'email' => 'nasabah@example.com',
                'email_verified_at' => null,
                'no_hp' => '084444444444',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '2000-04-04',
                'jenis_kelamin' => 'perempuan',
                'status_perkawinan' => 'belum menikah',
                'pekerjaan' => 'Karyawan',
                'alamat' => 'Jl. Pajajaran Bogor',
                'password' => Hash::make('12345678'),
                'role' => 'nasabah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}