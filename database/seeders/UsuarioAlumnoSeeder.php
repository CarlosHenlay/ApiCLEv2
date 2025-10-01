<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsuarioAlumno;

class UsuarioAlumnoSeeder extends Seeder
{
    public function run(): void
    {
        UsuarioAlumno::create([
            'usuAlu_Nom' => 'alumno1',
            'usuAlu_Pas' => 'alumno123',
            'dom_Id' => 3
        ]);

        UsuarioAlumno::create([
            'usuAlu_Nom' => 'alumno2',
            'usuAlu_Pas' => 'alumno123',
            'dom_Id' => 3
        ]);

        UsuarioAlumno::create([
            'usuAlu_Nom' => 'alumno3',
            'usuAlu_Pas' => 'alumno123',
            'dom_Id' => 3
        ]);
    }
}