<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('mysql')->table('prodi')->insert([
            ['id' => 1, 'nama_prodi' => 'Teknik Informatika'],
            ['id' => 2, 'nama_prodi' => 'Sistem Informasi'],
            ['id' => 3, 'nama_prodi' => 'Ilmu Komputer'],
        ]);
    }
}
