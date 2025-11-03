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
            'rol' => 'admin',
            'dom_Mat1' => 'Todos los permisos',
            'dom_Mat2' => 'Acceso completo',
            'dom_Obs' => 'Rol administrativo'
        ]);

        Dominio::create([
            'dom_Nom' => 'Control Escolar',
            'rol' => 'control_escolar',
            'dom_Mat1' => 'Gestión académica',
            'dom_Mat2' => 'Manejo de estudiantes',
            'dom_Obs' => 'Rol de control escolar'
        ]);
        Dominio::create([
            'dom_Nom'=>'Alumno',
            'rol'=>'alumno',
            'dom_Mat1'=>'Acceso a cursos',
            'dom_Mat2'=>'Visualización de calificaciones',
            'dom_Obs'=>'Rol de estudiante'
        ]);

    }
}