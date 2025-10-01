<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Parametro;

class ParametroSeeder extends Seeder
{
    public function run(): void
    {
        Parametro::create([
            'par_NomPar' => 'CALIFICACION_MINIMA',
            'par_Val1' => '70',
            'par_Val2' => 'Aprobado',
            'par_Val3' => 'Calificación mínima para aprobar',
            'par_Obs' => 'Parámetro académico'
        ]);

        Parametro::create([
            'par_NomPar' => 'DIAS_INSCRIPCION',
            'par_Val1' => '15',
            'par_Val2' => 'Días hábiles',
            'par_Val3' => 'Período de inscripción',
            'par_Obs' => 'Parámetro administrativo'
        ]);

        Parametro::create([
            'par_NomPar' => 'CAPACIDAD_MAXIMA_GRUPO',
            'par_Val1' => '30',
            'par_Val2' => 'Estudiantes',
            'par_Val3' => 'Límite por grupo',
            'par_Obs' => 'Parámetro de capacidad'
        ]);
    }
}