<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('mysql')->table('role')->insert([
            ['id' => 1, 'nama_role' => 'Mahasiswa'],
            ['id' => 2, 'nama_role' => 'Kepala Program Studi'],
            ['id' => 3, 'nama_role' => 'Manajer Operasional'],
        ]);
    }
}
