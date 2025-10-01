<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dominio;

class DominioSeeder extends Seeder
{
    public function run(): void
    {
        Dominio::create([
            'dom_Nom' => 'Administrador',
            'dom_Mat1' => 'Todos los permisos',
            'dom_Mat2' => 'Acceso completo',
            'dom_Obs' => 'Rol administrativo'
        ]);

        Dominio::create([
            'dom_Nom' => 'Docente',
            'dom_Mat1' => 'Gestionar grupos y calificaciones',
            'dom_Mat2' => 'Ver alumnos',
            'dom_Obs' => 'Rol docente'
        ]);

        Dominio::create([
            'dom_Nom' => 'Alumno',
            'dom_Mat1' => 'Ver sus datos y calificaciones',
            'dom_Mat2' => 'Inscribirse a módulos',
            'dom_Obs' => 'Rol alumno'
        ]);
    }
}