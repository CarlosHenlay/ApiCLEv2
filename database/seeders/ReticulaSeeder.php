<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reticula;

class ReticulaSeeder extends Seeder
{
    public function run(): void
    {
        Reticula::create([
            'ret_Mod' => 'M001',
            'ret_Nom' => 'Matemáticas Básicas',
            'ret_Ord' => 1,
            'pla_Id' => 1
        ]);

        Reticula::create([
            'ret_Mod' => 'M002',
            'ret_Nom' => 'Comunicación Oral y Escrita',
            'ret_Ord' => 2,
            'pla_Id' => 1
        ]);

        Reticula::create([
            'ret_Mod' => 'M003',
            'ret_Nom' => 'Introducción a la Informática',
            'ret_Ord' => 3,
            'pla_Id' => 2
        ]);
    }
}