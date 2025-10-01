<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HistoricoPago;

class HistoricoPagoSeeder extends Seeder
{
    public function run(): void
    {
        HistoricoPago::create([
            'alu_Id' => 1,
            'ret_Id' => 1,
            'hisPa_Fech' => '2024-08-01',
            'hisPa_Rec' => 'REC001',
            'hisPa_Mon' => 1500.00,
            'hisPa_Per' => 'AGO-DIC-2024',
            'hisPa_An' => 2024
        ]);

        HistoricoPago::create([
            'alu_Id' => 2,
            'ret_Id' => 2,
            'hisPa_Fech' => '2024-08-02',
            'hisPa_Rec' => 'REC002',
            'hisPa_Mon' => 1200.00,
            'hisPa_Per' => 'AGO-DIC-2024',
            'hisPa_An' => 2024
        ]);

        HistoricoPago::create([
            'alu_Id' => 3,
            'ret_Id' => 3,
            'hisPa_Fech' => '2024-08-03',
            'hisPa_Rec' => 'REC003',
            'hisPa_Mon' => 1500.00,
            'hisPa_Per' => 'AGO-DIC-2024',
            'hisPa_An' => 2024
        ]);
    }
}