<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deudor;

class DeudorSeeder extends Seeder
{
    public function run(): void
    {
        Deudor::create([
            'alu_Id' => 1,
            'deu_Con' => 'Inscripción pendiente de pago',
            'deu_Fech' => '2024-08-01',
            'deu_Per' => 'AGO-DIC-2024',
            'deu_An' => 2024,
            'deu_Obs' => 'Pendiente de liquidar'
        ]);

        Deudor::create([
            'alu_Id' => 2,
            'deu_Con' => 'Pago parcial de colegiatura',
            'deu_Fech' => '2024-08-15',
            'deu_Per' => 'AGO-DIC-2024',
            'deu_An' => 2024,
            'deu_Obs' => 'Falta segundo pago'
        ]);

        Deudor::create([
            'alu_Id' => 3,
            'deu_Con' => 'Materiales no pagados',
            'deu_Fech' => '2024-09-01',
            'deu_Per' => 'AGO-DIC-2024',
            'deu_An' => 2024,
            'deu_Obs' => 'Libros pendientes'
        ]);
    }
}