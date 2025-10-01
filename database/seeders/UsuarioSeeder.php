<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'usu_Nom' => 'Admin Principal',
            'usu_Pas' => 'password123',
            'usu_Clas' => 'Administrador',
            'dom_Id' => 1
        ]);

        Usuario::create([
            'usu_Nom' => 'Profesor Juan',
            'usu_Pas' => 'password123',
            'usu_Clas' => 'Docente',
            'dom_Id' => 2
        ]);

        Usuario::create([
            'usu_Nom' => 'Coordinador María',
            'usu_Pas' => 'password123',
            'usu_Clas' => 'Coordinador',
            'dom_Id' => 1
        ]);
    }
}