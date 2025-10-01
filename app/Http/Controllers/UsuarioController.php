<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Dominio;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('dominio')->get();
        return response()->json([
            'success' => true,
            'data' => $usuarios
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usu_Nom' => 'required|string|max:60',
            'usu_Pas' => 'required|string|max:30',
            'usu_Clas' => 'required|string|max:15',
            'dom_Id' => 'required|exists:dominios,dom_Id',
        ]);

        $usuario = Usuario::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Usuario creado exitosamente',
            'data' => $usuario
        ], 201);
    }

    public function show($id)
    {
        $usuario = Usuario::with('dominio')->find($id);
        
        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $usuario
        ]);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        
        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        $request->validate([
            'usu_Nom' => 'required|string|max:60',
            'usu_Pas' => 'required|string|max:30',
            'usu_Clas' => 'required|string|max:15',
            'dom_Id' => 'required|exists:dominios,dom_Id',
        ]);

        $usuario->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Usuario actualizado exitosamente',
            'data' => $usuario
        ]);
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        
        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        $usuario->delete();

        return response()->json([
            'success' => true,
            'message' => 'Usuario eliminado exitosamente'
        ]);
    }
}