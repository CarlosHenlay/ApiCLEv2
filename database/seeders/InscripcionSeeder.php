<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inscripcion;

class InscripcionSeeder extends Seeder
{
    public function run(): void
    {
        Inscripcion::create([
            'ins_Ctr' => '20240001',
            'gru_Id' => 1,
            'ins_Fech' => '2024-08-01',
            'ins_Rec' => 'INS001',
            'ins_Mon' => 1500.00,
            'ins_Per' => 'AGO-DIC-2024',
            'ins_An' => 2024,
            'ins_P1' => 85,
            'ins_P2' => 0,
            'ins_P3' => 0,
            'ins_P4' => 0,
            'ins_PF' => 0,
            'ins_Obs' => 'Inscrito correctamente'
        ]);

        Inscripcion::create([
            'ins_Ctr' => '20240002',
            'gru_Id' => 2,
            'ins_Fech' => '2024-08-02',
            'ins_Rec' => 'INS002',
            'ins_Mon' => 1200.00,
            'ins_Per' => 'AGO-DIC-2024',
            'ins_An' => 2024,
            'ins_P1' => 90,
            'ins_P2' => 0,
            'ins_P3' => 0,
            'ins_P4' => 0,
            'ins_PF' => 0,
            'ins_Obs' => 'Con beca aplicada'
        ]);

        Inscripcion::create([
            'ins_Ctr' => '20240003',
            'gru_Id' => 3,
            'ins_Fech' => '2024-08-03',
            'ins_Rec' => 'INS003',
            'ins_Mon' => 1500.00,
            'ins_Per' => 'AGO-DIC-2024',
            'ins_An' => 2024,
            'ins_P1' => 78,
            'ins_P2' => 0,
            'ins_P3' => 0,
            'ins_P4' => 0,
            'ins_PF' => 0,
            'ins_Obs' => 'Inscripción regular'
        ]);
    }
}