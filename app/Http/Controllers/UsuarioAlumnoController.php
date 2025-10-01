<?php

namespace App\Http\Controllers;

use App\Models\UsuarioAlumno;
use App\Models\Dominio;
use Illuminate\Http\Request;

class UsuarioAlumnoController extends Controller
{
    public function index()
    {
        $usuariosAlumnos = UsuarioAlumno::with('dominio')->get();
        return response()->json([
            'success' => true,
            'data' => $usuariosAlumnos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuAlu_Nom' => 'required|string|max:60',
            'usuAlu_Pas' => 'required|string|max:30',
            'dom_Id' => 'required|exists:dominios,dom_Id',
        ]);

        $usuarioAlumno = UsuarioAlumno::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Usuario alumno creado exitosamente',
            'data' => $usuarioAlumno
        ], 201);
    }

    public function show($id)
    {
        $usuarioAlumno = UsuarioAlumno::with('dominio')->find($id);
        
        if (!$usuarioAlumno) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario alumno no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $usuarioAlumno
        ]);
    }

    public function update(Request $request, $id)
    {
        $usuarioAlumno = UsuarioAlumno::find($id);
        
        if (!$usuarioAlumno) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario alumno no encontrado'
            ], 404);
        }

        $request->validate([
            'usuAlu_Nom' => 'required|string|max:60',
            'usuAlu_Pas' => 'required|string|max:30',
            'dom_Id' => 'required|exists:dominios,dom_Id',
        ]);

        $usuarioAlumno->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Usuario alumno actualizado exitosamente',
            'data' => $usuarioAlumno
        ]);
    }

    public function destroy($id)
    {
        $usuarioAlumno = UsuarioAlumno::find($id);
        
        if (!$usuarioAlumno) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario alumno no encontrado'
            ], 404);
        }

        $usuarioAlumno->delete();

        return response()->json([
            'success' => true,
            'message' => 'Usuario alumno eliminado exitosamente'
        ]);
    }
}