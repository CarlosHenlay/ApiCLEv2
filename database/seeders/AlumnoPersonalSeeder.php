<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlumnoPersonal;

class AlumnoPersonalSeeder extends Seeder
{
    public function run(): void
    {
        AlumnoPersonal::create([
            'alu_Id' => 1,
            'aluPer_TelPer' => '8123456789',
            'aluPer_TelCasa' => '8187654321',
            'aluPer_Correo' => 'juan.rodriguez@email.com',
            'aluPer_CalleNum' => 'Av. Universidad 123',
            'aluPer_Col' => 'Centro',
            'aluPer_Loc' => 'Monterrey',
            'min_Id' => 1,
            'est_Id' => 1,
            'aluPer_TipSan' => 'A+',
            'aluPer_FechNac' => '1995-05-15',
            'aluPer_NomTut' => 'Roberto Rodríguez',
            'aluPer_TelTut' => '8111223344'
        ]);

        AlumnoPersonal::create([
            'alu_Id' => 2,
            'aluPer_TelPer' => '8134567890',
            'aluPer_TelCasa' => '8176543210',
            'aluPer_Correo' => 'maria.gomez@email.com',
            'aluPer_CalleNum' => 'Calle Hidalgo 456',
            'aluPer_Col' => 'Mitras',
            'aluPer_Loc' => 'Monterrey',
            'min_Id' => 1,
            'est_Id' => 1,
            'aluPer_TipSan' => 'O+',
            'aluPer_FechNac' => '1988-03-20',
            'aluPer_NomTut' => 'Ana Martínez',
            'aluPer_TelTut' => '8133445566'
        ]);

        AlumnoPersonal::create([
            'alu_Id' => 3,
            'aluPer_TelPer' => '8156789012',
            'aluPer_TelCasa' => '8165432109',
            'aluPer_Correo' => 'carlos.lopez@email.com',
            'aluPer_CalleNum' => 'Blvd. Constitución 789',
            'aluPer_Col' => 'San Nicolás',
            'aluPer_Loc' => 'Monterrey',
            'min_Id' => 1,
            'est_Id' => 1,
            'aluPer_TipSan' => 'B+',
            'aluPer_FechNac' => '1992-08-10',
            'aluPer_NomTut' => 'Luisa García',
            'aluPer_TelTut' => '8155667788'
        ]);
    }
}