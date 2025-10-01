<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GrupoSeeder extends Seeder
{
    public function run(): void
    {
        Grupo::create([
            'ret_Id' => 1,
            'gru_Cgr' => 'G001',
            'doc_Id' => 1,
            'gru_Lim' => 25,
            'gru_Can' => 20,
            'gru_HLu' => '07:00:00',
            'gru_ALu' => '09:00',
            'gru_HMa' => null,
            'gru_AMa' => null,
            'gru_HMi' => null,
            'gru_AMi' => null,
            'gru_HJu' => null,
            'gru_AJu' => null,
            'gru_HVi' => null,
            'gru_AVi' => null,
            'gru_HSa' => null,
            'gru_ASa' => null,
            'gru_Des' => 'Grupo matutino',
            'gru_Cla' => 'A'
        ]);

        Grupo::create([
            'ret_Id' => 2,
            'gru_Cgr' => 'G002',
            'doc_Id' => 2,
            'gru_Lim' => 30,
            'gru_Can' => 25,
            'gru_HLu' => null,
            'gru_ALu' => null,
            'gru_HMa' => '14:00:00',
            'gru_AMa' => '16:00',
            'gru_HMi' => null,
            'gru_AMi' => null,
            'gru_HJu' => null,
            'gru_AJu' => null,
            'gru_HVi' => null,
            'gru_AVi' => null,
            'gru_HSa' => null,
            'gru_ASa' => null,
            'gru_Des' => 'Grupo vespertino',
            'gru_Cla' => 'B'
        ]);

        Grupo::create([
            'ret_Id' => 3,
            'gru_Cgr' => 'G003',
            'doc_Id' => 3,
            'gru_Lim' => 20,
            'gru_Can' => 15,
            'gru_HLu' => null,
            'gru_ALu' => null,
            'gru_HMa' => null,
            'gru_AMa' => null,
            'gru_HMi' => '18:00:00',
            'gru_AMi' => '20:00',
            'gru_HJu' => null,
            'gru_AJu' => null,
            'gru_HVi' => null,
            'gru_AVi' => null,
            'gru_HSa' => null,
            'gru_ASa' => null,
            'gru_Des' => 'Grupo nocturno',
            'gru_Cla' => 'C'
        ]);
    }
}