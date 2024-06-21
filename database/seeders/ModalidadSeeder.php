<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modalidades')->insert([
            'nombre' => 'Presencial'
        ]);

        DB::table('modalidades')->insert([
            'nombre' => 'Remoto'
        ]);

        DB::table('modalidades')->insert([
            'nombre' => 'Hibrido'
        ]);
    }
}
