<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // ¡IMPORTANTE: Usar la fachada Hash!
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'usu_Nom' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = Usuario::with('dominio')->where('usu_Nom', $request->usu_Nom)->first();

         // 🔑 MODIFICACIÓN CLAVE: Usar Hash::check() para comparar la contraseña ingresada
         // (texto plano) con la contraseña almacenada (hasheada).
         if (!$user || !Hash::check($request->password, $user->usu_Pas)) {
            return response()->json([
                'success' => false,
                'error' => 'Credenciales inválidas'
            ], 401);
        }

        $rolValido = $user->dominio && in_array($user->dominio->rol, ['admin', 'control_escolar']);
        
        if (!$rolValido) {
            return response()->json([
                'success' => false,
                'error' => 'Usuario no autorizado para acceder al sistema'
            ], 403);
        }

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            // Asegúrate de que config('jwt.ttl') existe y es el valor correcto para segundos
            'expires_in' => config('jwt.ttl') * 60, 
            'user' => [
                'id' => $user->usu_Id,
                'nombre' => $user->usu_Nom,
                'clasificacion' => $user->usu_Clas,
                'rol' => $user->dominio->rol,
                'dominio' => $user->dominio->dom_Nom,
            ]
        ]);
    }

    public function logout()
    {
        try {
            // Asegúrate de invalidar el token actual
            JWTAuth::invalidate(JWTAuth::getToken());
            
            return response()->json([
                'success' => true,
                'message' => 'Sesión cerrada exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                // Puede ser un error si el token ya expiró, pero aún así se considera logout.
                'error' => 'Error al cerrar sesión o token ya inválido' 
            ], 500);
        }
    }

    public function me()
    {
        try {
            // Obtiene el usuario autenticado desde el token
            $user = JWTAuth::parseToken()->authenticate(); 
            
            return response()->json([
                'success' => true,
                'user' => [
                    'id' => $user->usu_Id,
                    'nombre' => $user->usu_Nom,
                    'clasificacion' => $user->usu_Clas,
                    // Asegura que la relación 'dominio' esté cargada
                    'rol' => $user->dominio->rol ?? null, 
                    'dominio' => $user->dominio->dom_Nom ?? null,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Usuario no autenticado'
            ], 401);
        }
    }

    public function refresh()
    {
        try {
            // Refresca el token actual y devuelve uno nuevo
            $token = JWTAuth::refresh(JWTAuth::getToken());
            
            return response()->json([
                'success' => true,
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => config('jwt.ttl') * 60,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'No se pudo refrescar el token'
            ], 401);
        }
    }
}