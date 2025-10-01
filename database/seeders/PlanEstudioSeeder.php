<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PlanEstudio;

class PlanEstudioSeeder extends Seeder
{
    public function run(): void
    {
        PlanEstudio::create([
            'pla_CveInt' => 'BCH',
            'pla_Nom' => 'Bachillerato General',
            'pla_CveOfi' => 'BCH-GEN-2024',
            'pla_Fei' => '2024-01-15',
            'pla_Fef' => null,
            'pla_sta' => 'A',
            'pla_cmod' => 12
        ]);

        PlanEstudio::create([
            'pla_CveInt' => 'TEC',
            'pla_Nom' => 'Técnico en Informática',
            'pla_CveOfi' => 'TEC-INF-2024',
            'pla_Fei' => '2024-01-15',
            'pla_Fef' => null,
            'pla_sta' => 'A',
            'pla_cmod' => 15
        ]);

        PlanEstudio::create([
            'pla_CveInt' => 'COM',
            'pla_Nom' => 'Computación Básica',
            'pla_CveOfi' => 'COM-BAS-2024',
            'pla_Fei' => '2024-01-15',
            'pla_Fef' => null,
            'pla_sta' => 'A',
            'pla_cmod' => 6
        ]);
    }
}