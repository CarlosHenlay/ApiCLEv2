<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Municipio;

class MunicipioSeeder extends Seeder
{
    public function run(): void
    {
        Municipio::create(['mun_Nom' => 'Monterrey']);
        Municipio::create(['mun_Nom' => 'Saltillo']);
        Municipio::create(['mun_Nom' => 'Reynosa']);
    }
}