<?php

namespace Database\Seeders;

use App\Models\Vacante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VacanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vacante::factory()
            ->count(10)
            ->create();
    }
}
