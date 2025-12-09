<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash; // <-- ¡Paso 1: Importar la fachada Hash!

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario administrador
        Usuario::create([
            'usu_Nom' => 'admin',
            // 🔑 Paso 2: Usar Hash::make() para hashear la contraseña
            'usu_Pas' => Hash::make('admin123'), 
            'usu_Clas' => 'Administrador',
            'dom_Id' => 1,
        ]);
        
        // Crear usuario control escolar
        Usuario::create([
            'usu_Nom' => 'control',
            // 🔑 Paso 3: Usar Hash::make() para hashear la contraseña
            'usu_Pas' => Hash::make('control123'), 
            'usu_Clas' => 'Control Escolar',
            'dom_Id' => 2,
        ]);

    
    }
}