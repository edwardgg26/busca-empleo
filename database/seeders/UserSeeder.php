<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Edward Gonzalez',
            'email' => 'edwardocool55@gmail.com',
            'email_verified_at'=>'2024-01-20 00:55:09',
            'password' => '$2y$12$8etgZ7KdMAxgqG6L//qXeuNqmZ81nqC/2aRmIzaYYTiZ0MzSbE56C',
            'remember_token'=>null,
            'created_at'=>'2024-01-20 00:54:46',
            'updated_at'=>'2024-01-20 00:55:09',
            'rol_id'=>2
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'email_verified_at'=>'2024-01-20 00:55:09',
            'password' => '$2y$12$8etgZ7KdMAxgqG6L//qXeuNqmZ81nqC/2aRmIzaYYTiZ0MzSbE56C',
            'remember_token'=>null,
            'created_at'=>'2024-01-20 00:54:46',
            'updated_at'=>'2024-01-20 00:55:09',
            'rol_id'=>1
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'email_verified_at'=>'2024-01-20 00:55:09',
            'password' => '$2y$12$8etgZ7KdMAxgqG6L//qXeuNqmZ81nqC/2aRmIzaYYTiZ0MzSbE56C',
            'remember_token'=>null,
            'created_at'=>'2024-01-20 00:54:46',
            'updated_at'=>'2024-01-20 00:55:09',
            'rol_id'=>2
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'email_verified_at'=>'2024-01-20 00:55:09',
            'password' => '$2y$12$8etgZ7KdMAxgqG6L//qXeuNqmZ81nqC/2aRmIzaYYTiZ0MzSbE56C',
            'remember_token'=>null,
            'created_at'=>'2024-01-20 00:54:46',
            'updated_at'=>'2024-01-20 00:55:09',
            'rol_id'=>1
        ]);
    }
}
