<?php

namespace App\Console\Commands;

use App\Models\Dominio;
use App\Models\Usuario;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CheckAuthSetup extends Command
{
    protected $signature = 'auth:check';
    protected $description = 'Verificar configuración de autenticación';

    public function handle()
    {
        $this->info('=== VERIFICANDO CONFIGURACIÓN AUTH ===');

        // Verificar dominios
        $dominios = Dominio::all();
        $this->info("\nDOMINIOS EXISTENTES:");
        if ($dominios->count() > 0) {
            foreach ($dominios as $dom) {
                $this->line("ID: {$dom->dom_Id} - {$dom->dom_Nom} - Rol: " . ($dom->rol ?? 'NO ASIGNADO'));
            }
        } else {
            $this->error('No hay dominios en la base de datos');
        }

        // Verificar usuarios
        $this->info("\nUSUARIOS EXISTENTES:");
        $usuarios = Usuario::with('dominio')->get();
        if ($usuarios->count() > 0) {
            foreach ($usuarios as $user) {
                $rol = $user->dominio ? $user->dominio->rol : 'SIN DOMINIO';
                $this->line("Usuario: {$user->usu_Nom} - Dominio ID: {$user->dom_Id} - Rol: {$rol}");
            }
        } else {
            $this->error('No hay usuarios en la base de datos');
        }

        // Verificar login
        $this->info("\nPRUEBA DE LOGIN:");
        $admin = Usuario::with('dominio')->where('usu_Nom', 'admin')->first();
        if ($admin) {
            $passwordCorrecto = Hash::check('admin123', $admin->usu_Pas);
            $rolValido = $admin->dominio && in_array($admin->dominio->rol, ['admin', 'control_escolar']);
            
            $this->line("Usuario 'admin':");
            $this->line("- Password correcto: " . ($passwordCorrecto ? 'SÍ' : 'NO'));
            $this->line("- Rol válido: " . ($rolValido ? 'SÍ' : 'NO'));
            $this->line("- Rol actual: " . ($admin->dominio ? $admin->dominio->rol : 'NO TIENE ROL'));
        } else {
            $this->error('Usuario admin no encontrado');
        }

        return Command::SUCCESS;
    }
}