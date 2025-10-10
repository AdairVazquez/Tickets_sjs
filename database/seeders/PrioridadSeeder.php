<?php

namespace Database\Seeders;

use App\Models\Prioridad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prioridades')->insert([
            ['nivel' => 'Baja'],
            ['nivel' => 'Media'],
            ['nivel' => 'Alta'], 
            ['nivel' => 'Urgente'],
        ]);
        
    }
}
