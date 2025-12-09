<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Dominio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // ¡IMPORTANTE: Importar la fachada Hash!

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
            // Quitar el max:30 de la validación ya que el hash es más largo
            'usu_Pas' => 'required|string', 
            'usu_Clas' => 'required|string|max:15',
            'dom_Id' => 'required|exists:dominios,dom_Id',
        ]);
        
        // 🔑 1. Obtener todos los datos
        $data = $request->all();
        
        // 🔑 2. HACER EL HASH: Hashear la contraseña antes de guardarla
        $data['usu_Pas'] = Hash::make($request->usu_Pas); 

        // 🔑 3. Crear el usuario con la contraseña hasheada
        $usuario = Usuario::create($data); 

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

        // Reglas de validación
        $request->validate([
            'usu_Nom' => 'required|string|max:60',
            // 'usu_Pas' es ahora 'nullable' (opcional) en la actualización
            'usu_Pas' => 'nullable|string', 
            'usu_Clas' => 'required|string|max:15',
            'dom_Id' => 'required|exists:dominios,dom_Id',
        ]);

        $data = $request->all();
        
        // 🔑 LÓGICA DE ACTUALIZACIÓN SEGURA:
        if ($request->has('usu_Pas') && !empty($request->usu_Pas)) {
            // Si el frontend envía una nueva contraseña, la hasheamos y la guardamos.
            $data['usu_Pas'] = Hash::make($request->usu_Pas);
        } else {
            // Si no se envía una contraseña nueva, la quitamos de los datos
            // para que Laravel no intente actualizarla y mantenga la contraseña anterior (hasheada).
            unset($data['usu_Pas']); 
        }

        $usuario->update($data);

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