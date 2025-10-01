<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            EstadoSeeder::class,
            MunicipioSeeder::class,
            DominioSeeder::class,
            UsuarioSeeder::class,
            UsuarioAlumnoSeeder::class,
            TabuladorPagoSeeder::class,
            PlanEstudioSeeder::class,
            ReticulaSeeder::class,
            AlumnoSeeder::class,
            AlumnoPersonalSeeder::class,
            DocenteSeeder::class,
            GrupoSeeder::class,
            CardexSeeder::class,
            DeudorSeeder::class,
            HistoricoPagoSeeder::class,
            InscripcionSeeder::class,
            ParametroSeeder::class,
        ]);
    }
}