<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('mysql')->table('users')->insert([
            [
                'nrp_nip' => '0000001',
                'password' => Hash::make('password123'),
                'nama_lengkap' => 'Dummy Mahasiswa',
                'email' => 'mhs@example.com',
                'status' => 1,
                'prodi_id' => 1,
                'role_id' => 1, # mahasiswa
            ],
            [
                'nrp_nip' => '0000002',
                'password' => Hash::make('password123'),
                'nama_lengkap' => 'Dummy Kaprodi',
                'email' => 'dosen@example.com',
                'status' => 1,
                'prodi_id' => 1,
                'role_id' => 2, 
            ],
            [
                'nrp_nip' => '0000003',
                'password' => Hash::make('password123'),
                'nama_lengkap' => 'Dummy Manajer',
                'email' => 'manajer@example.com',
                'status' => 1,
                'prodi_id' => 1,
                'role_id' => 3, 
            ],

            [
                'nrp_nip' => '0000004',
                'password' => Hash::make('password123'),
                'nama_lengkap' => 'Dummy Admin',
                'email' => 'admin@example.com',
                'status' => 1,
                'prodi_id' => 1,
                'role_id' => 4, 
            ],
        ]);
    }
}
