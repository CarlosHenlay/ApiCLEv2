<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index()
    {
        $estados = Estado::all();
        return response()->json([
            'success' => true,
            'data' => $estados
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'est_Nom' => 'required|string|max:50',
        ]);

        $estado = Estado::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Estado creado exitosamente',
            'data' => $estado
        ], 201);
    }

    public function show($id)
    {
        $estado = Estado::find($id);
        
        if (!$estado) {
            return response()->json([
                'success' => false,
                'message' => 'Estado no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $estado
        ]);
    }

    public function update(Request $request, $id)
    {
        $estado = Estado::find($id);
        
        if (!$estado) {
            return response()->json([
                'success' => false,
                'message' => 'Estado no encontrado'
            ], 404);
        }

        $request->validate([
            'est_Nom' => 'required|string|max:50',
        ]);

        $estado->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Estado actualizado exitosamente',
            'data' => $estado
        ]);
    }

    public function destroy($id)
    {
        $estado = Estado::find($id);
        
        if (!$estado) {
            return response()->json([
                'success' => false,
                'message' => 'Estado no encontrado'
            ], 404);
        }

        $estado->delete();

        return response()->json([
            'success' => true,
            'message' => 'Estado eliminado exitosamente'
        ]);
    }
}