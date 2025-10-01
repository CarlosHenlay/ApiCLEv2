<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function index()
    {
        $municipios = Municipio::all();
        return response()->json([
            'success' => true,
            'data' => $municipios
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mun_Nom' => 'required|string|max:50',
        ]);

        $municipio = Municipio::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Municipio creado exitosamente',
            'data' => $municipio
        ], 201);
    }

    public function show($id)
    {
        $municipio = Municipio::find($id);
        
        if (!$municipio) {
            return response()->json([
                'success' => false,
                'message' => 'Municipio no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $municipio
        ]);
    }

    public function update(Request $request, $id)
    {
        $municipio = Municipio::find($id);
        
        if (!$municipio) {
            return response()->json([
                'success' => false,
                'message' => 'Municipio no encontrado'
            ], 404);
        }

        $request->validate([
            'mun_Nom' => 'required|string|max:50',
        ]);

        $municipio->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Municipio actualizado exitosamente',
            'data' => $municipio
        ]);
    }

    public function destroy($id)
    {
        $municipio = Municipio::find($id);
        
        if (!$municipio) {
            return response()->json([
                'success' => false,
                'message' => 'Municipio no encontrado'
            ], 404);
        }

        $municipio->delete();

        return response()->json([
            'success' => true,
            'message' => 'Municipio eliminado exitosamente'
        ]);
    }
}