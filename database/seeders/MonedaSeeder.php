<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('monedas')->insert([
            'nombre' => 'Peso Colombiano',
            'prefijo' => 'COP'
        ]);

        DB::table('monedas')->insert([
            'nombre' => 'Dolar',
            'prefijo' => 'USD'
        ]);
    }
}
