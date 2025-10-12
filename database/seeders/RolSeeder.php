<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rol')->insert([
            ['nombre_rol' => 'Administrador'],
            ['nombre_rol' =>'Soporte'],
            ['nombre_rol' => 'Cliente']
        ]);
    }
}
