<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario administrador
        Usuario::create([
            'usu_Nom' => 'admin',
            'usu_Pas' => 'admin123',
            'usu_Clas' => 'Administrador',
            'dom_Id' => 1,
        ]);
        // Crear usuario control escolar
        Usuario::create([
            'usu_Nom' => 'control',
            'usu_Pas' => 'control123',
            'usu_Clas' => 'Control Escolar',
            'dom_Id' => 2,
        ]);

    
    }
}