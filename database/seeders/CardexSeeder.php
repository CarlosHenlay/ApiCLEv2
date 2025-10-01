<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cardex;

class CardexSeeder extends Seeder
{
    public function run(): void
    {
        Cardex::create([
            'alu_Id' => 1,
            'ret_Id' => 1,
            'car_Cal' => 85,
            'car_Per' => 'AGO-DIC-2024',
            'car_An' => 2024,
            'car_Acr' => 'S',
            'car_Obs' => 'Buen desempeño'
        ]);

        Cardex::create([
            'alu_Id' => 2,
            'ret_Id' => 2,
            'car_Cal' => 90,
            'car_Per' => 'AGO-DIC-2024',
            'car_An' => 2024,
            'car_Acr' => 'S',
            'car_Obs' => 'Excelente estudiante'
        ]);

        Cardex::create([
            'alu_Id' => 3,
            'ret_Id' => 3,
            'car_Cal' => 78,
            'car_Per' => 'AGO-DIC-2024',
            'car_An' => 2024,
            'car_Acr' => 'S',
            'car_Obs' => 'Aprobado'
        ]);
    }
}