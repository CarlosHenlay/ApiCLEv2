<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TabuladorPago;

class TabuladorPagoSeeder extends Seeder
{
    public function run(): void
    {
        TabuladorPago::create([
            'tab_NomTab' => 'Tabulador Básico',
            'tab_Mon' => 1500.00,
            'tab_Obs' => 'Para alumnos regulares'
        ]);

        TabuladorPago::create([
            'tab_NomTab' => 'Tabulador Especial',
            'tab_Mon' => 1200.00,
            'tab_Obs' => 'Para alumnos con beca'
        ]);

        TabuladorPago::create([
            'tab_NomTab' => 'Tabulador Extemporáneo',
            'tab_Mon' => 1800.00,
            'tab_Obs' => 'Para inscripciones tardías'
        ]);
    }
}