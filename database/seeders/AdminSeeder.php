<?php

namespace Database\Seeders;

use App\Models\Dominio;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Crear solo los dominios que necesitamos
        $dominios = [
            [
                'dom_Nom' => 'Administración General',
                'rol' => 'admin',
                'dom_Mat1' => 'Acceso total al sistema',
                'dom_Obs' => 'Administrador general'
            ],
            [
                'dom_Nom' => 'Control Escolar',
                'rol' => 'control_escolar',
                'dom_Mat1' => 'Gestión académica y administrativa',
                'dom_Obs' => 'Personal de control escolar'
            ],
        ];

        foreach ($dominios as $dominio) {
            Dominio::create($dominio);
        }

        

        

        $this->command->info('Usuarios de administración creados:');
        $this->command->info('- admin / admin123');
        $this->command->info('- control / control123');
    }
}