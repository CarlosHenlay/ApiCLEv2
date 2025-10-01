<?php

namespace App\Http\Controllers;

use App\Models\Dominio;
use Illuminate\Http\Request;

class DominioController extends Controller
{
    public function index()
    {
        $dominios = Dominio::all();
        return response()->json([
            'success' => true,
            'data' => $dominios
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dom_Nom' => 'required|string|max:30',
            'dom_Mat1' => 'required|string|max:150',
            'dom_Mat2' => 'nullable|string|max:150',
            'dom_Obs' => 'nullable|string|max:30',
        ]);

        $dominio = Dominio::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Dominio creado exitosamente',
            'data' => $dominio
        ], 201);
    }

    public function show($id)
    {
        $dominio = Dominio::find($id);
        
        if (!$dominio) {
            return response()->json([
                'success' => false,
                'message' => 'Dominio no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $dominio
        ]);
    }

    public function update(Request $request, $id)
    {
        $dominio = Dominio::find($id);
        
        if (!$dominio) {
            return response()->json([
                'success' => false,
                'message' => 'Dominio no encontrado'
            ], 404);
        }

        $request->validate([
            'dom_Nom' => 'required|string|max:30',
            'dom_Mat1' => 'required|string|max:150',
            'dom_Mat2' => 'nullable|string|max:150',
            'dom_Obs' => 'nullable|string|max:30',
        ]);

        $dominio->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Dominio actualizado exitosamente',
            'data' => $dominio
        ]);
    }

    public function destroy($id)
    {
        $dominio = Dominio::find($id);
        
        if (!$dominio) {
            return response()->json([
                'success' => false,
                'message' => 'Dominio no encontrado'
            ], 404);
        }

        $dominio->delete();

        return response()->json([
            'success' => true,
            'message' => 'Dominio eliminado exitosamente'
        ]);
    }
}