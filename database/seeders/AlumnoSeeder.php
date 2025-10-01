<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    public function run(): void
    {
        Alumno::create([
            'alu_NumCtr' => '20240001',
            'alu_Curp' => 'ROAJ950515HNLNSN09',
            'alu_Nom' => 'Juan',
            'alu_AppPat' => 'Rodríguez',
            'alu_AppMat' => 'Pérez',
            'alu_Sexo' => 'M',
            'pla_Id' => 1,
            'alu_Sta' => 'A',
            'alu_Sem' => 1,
            'alu_IngPer' => 'AGO-2024',
            'alu_IngAn' => 2024,
            'alu_Ins' => 'S',
            'tab_Id' => 1,
            'usuAlu_Id' => 1
        ]);

        Alumno::create([
            'alu_NumCtr' => '20240002',
            'alu_Curp' => 'GOMA880320MNTLRN05',
            'alu_Nom' => 'María',
            'alu_AppPat' => 'Gómez',
            'alu_AppMat' => 'Martínez',
            'alu_Sexo' => 'F',
            'pla_Id' => 2,
            'alu_Sta' => 'A',
            'alu_Sem' => 1,
            'alu_IngPer' => 'AGO-2024',
            'alu_IngAn' => 2024,
            'alu_Ins' => 'S',
            'tab_Id' => 2,
            'usuAlu_Id' => 2
        ]);

        Alumno::create([
            'alu_NumCtr' => '20240003',
            'alu_Curp' => 'LOPL920810HPLBZR03',
            'alu_Nom' => 'Carlos',
            'alu_AppPat' => 'López',
            'alu_AppMat' => 'García',
            'alu_Sexo' => 'M',
            'pla_Id' => 1,
            'alu_Sta' => 'A',
            'alu_Sem' => 2,
            'alu_IngPer' => 'ENE-2024',
            'alu_IngAn' => 2024,
            'alu_Ins' => 'S',
            'tab_Id' => 1,
            'usuAlu_Id' => 3
        ]);
    }
}