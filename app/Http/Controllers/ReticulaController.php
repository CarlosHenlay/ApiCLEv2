<?php

namespace App\Http\Controllers;

use App\Models\Reticula;
use App\Models\PlanEstudio;
use Illuminate\Http\Request;

class ReticulaController extends Controller
{
    public function index()
    {
        $reticulas = Reticula::with('planEstudio')->get();
        return response()->json([
            'success' => true,
            'data' => $reticulas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ret_Mod' => 'required|string|max:5',
            'ret_Nom' => 'required|string|max:30',
            'ret_Ord' => 'required|integer',
            'pla_Id' => 'required|exists:planestudios,pla_Id',
        ]);

        $reticula = Reticula::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Reticula creada exitosamente',
            'data' => $reticula
        ], 201);
    }

    public function show($id)
    {
        $reticula = Reticula::with('planEstudio')->find($id);
        
        if (!$reticula) {
            return response()->json([
                'success' => false,
                'message' => 'Reticula no encontrada'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $reticula
        ]);
    }

    public function update(Request $request, $id)
    {
        $reticula = Reticula::find($id);
        
        if (!$reticula) {
            return response()->json([
                'success' => false,
                'message' => 'Reticula no encontrada'
            ], 404);
        }

        $request->validate([
            'ret_Mod' => 'required|string|max:5',
            'ret_Nom' => 'required|string|max:30',
            'ret_Ord' => 'required|integer',
            'pla_Id' => 'required|exists:planestudios,pla_Id',
        ]);

        $reticula->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Reticula actualizada exitosamente',
            'data' => $reticula
        ]);
    }

    public function destroy($id)
    {
        $reticula = Reticula::find($id);
        
        if (!$reticula) {
            return response()->json([
                'success' => false,
                'message' => 'Reticula no encontrada'
            ], 404);
        }

        $reticula->delete();

        return response()->json([
            'success' => true,
            'message' => 'Reticula eliminada exitosamente'
        ]);
    }
}