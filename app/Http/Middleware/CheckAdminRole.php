<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            if (!$user->dominio || !in_array($user->dominio->rol, $roles)) {
                return response()->json([
                    'success' => false,
                    'error' => 'No tienes permisos para acceder a este recurso'
                ], 403);
            }
            
            return $next($request);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Token inválido o no proporcionado'
            ], 401);
        }
    }
}