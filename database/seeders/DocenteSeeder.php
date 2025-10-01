<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Docente;

class DocenteSeeder extends Seeder
{
    public function run(): void
    {
        Docente::create([
            'doc_Nom' => 'Laura',
            'doc_AppPat' => 'Hernández',
            'doc_AppMat' => 'Sánchez',
            'doc_Ges' => '2024-2025',
            'doc_ComEst' => 'Excelente desempeño',
            'doc_TelPer' => '8188990011',
            'doc_TelCasa' => '8122334455',
            'doc_Correo' => 'laura.hernandez@cle.edu',
            'doc_CalleNum' => 'Av. Revolución 321',
            'doc_Col' => 'Contry',
            'doc_Loc' => 'Monterrey',
            'min_Id' => 1,
            'est_Id' => 1,
            'doc_FechIng' => '2020-08-01',
            'doc_Obs' => 'Coordinadora de Matemáticas',
            'usu_Id' => 2
        ]);

        Docente::create([
            'doc_Nom' => 'Roberto',
            'doc_AppPat' => 'Gutiérrez',
            'doc_AppMat' => 'López',
            'doc_Ges' => '2024-2025',
            'doc_ComEst' => 'Buen profesor',
            'doc_TelPer' => '8188001122',
            'doc_TelCasa' => '8144556677',
            'doc_Correo' => 'roberto.gutierrez@cle.edu',
            'doc_CalleNum' => 'Calle Zaragoza 654',
            'doc_Col' => 'Centro',
            'doc_Loc' => 'Monterrey',
            'min_Id' => 1,
            'est_Id' => 1,
            'doc_FechIng' => '2021-01-15',
            'doc_Obs' => 'Especialista en Informática',
            'usu_Id' => 2
        ]);

        Docente::create([
            'doc_Nom' => 'Sofia',
            'doc_AppPat' => 'Ramírez',
            'doc_AppMat' => 'Castro',
            'doc_Ges' => '2024-2025',
            'doc_ComEst' => 'Comprometida con la enseñanza',
            'doc_TelPer' => '8188112233',
            'doc_TelCasa' => '8166778899',
            'doc_Correo' => 'sofia.ramirez@cle.edu',
            'doc_CalleNum' => 'Blvd. Díaz Ordaz 987',
            'doc_Col' => 'San Pedro',
            'doc_Loc' => 'Monterrey',
            'min_Id' => 1,
            'est_Id' => 1,
            'doc_FechIng' => '2019-03-10',
            'doc_Obs' => 'Jefa de Comunicación',
            'usu_Id' => 2
        ]);
    }
}