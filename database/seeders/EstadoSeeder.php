<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    public function run(): void
    {
        Estado::create(['est_Nom' => 'Nuevo León']);
        Estado::create(['est_Nom' => 'Coahuila']);
        Estado::create(['est_Nom' => 'Tamaulipas']);
    }
}