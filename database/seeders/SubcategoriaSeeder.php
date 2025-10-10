<?php

namespace Database\Seeders;

use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('subcategoria')->insert([
            ['nombre' => 'Error'],
            ['nombre' => 'Servicio'],
            ['nombre' => 'Base de datos'],
            ['nombre' => 'Error 500']
         ]);

    }
}
