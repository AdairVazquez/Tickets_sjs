<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados')->insert([
            ['nombre_estado' => 'Abierto'],
            ['nombre_estado' => 'En proceso'],
            ['nombre_estado' => 'Cerrado'],
            ['nombre_estado' => 'Pausado'],
        ]);
    }
}
