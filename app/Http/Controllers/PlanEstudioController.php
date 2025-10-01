<?php

namespace App\Http\Controllers;

use App\Models\PlanEstudio;
use Illuminate\Http\Request;

class PlanEstudioController extends Controller
{
    public function index()
    {
        $planes = PlanEstudio::all();
        return response()->json([
            'success' => true,
            'data' => $planes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pla_CveInt' => 'required|string|max:3',
            'pla_Nom' => 'required|string|max:30',
            'pla_CveOfi' => 'nullable|string|max:30',
            'pla_Fei' => 'required|date',
            'pla_Fef' => 'nullable|date',
            'pla_sta' => 'required|string|max:1',
            'pla_cmod' => 'required|integer',
        ]);

        $plan = PlanEstudio::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Plan de estudio creado exitosamente',
            'data' => $plan
        ], 201);
    }

    public function show($id)
    {
        $plan = PlanEstudio::find($id);
        
        if (!$plan) {
            return response()->json([
                'success' => false,
                'message' => 'Plan de estudio no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $plan
        ]);
    }

    public function update(Request $request, $id)
    {
        $plan = PlanEstudio::find($id);
        
        if (!$plan) {
            return response()->json([
                'success' => false,
                'message' => 'Plan de estudio no encontrado'
            ], 404);
        }

        $request->validate([
            'pla_CveInt' => 'required|string|max:3',
            'pla_Nom' => 'required|string|max:30',
            'pla_CveOfi' => 'nullable|string|max:30',
            'pla_Fei' => 'required|date',
            'pla_Fef' => 'nullable|date',
            'pla_sta' => 'required|string|max:1',
            'pla_cmod' => 'required|integer',
        ]);

        $plan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Plan de estudio actualizado exitosamente',
            'data' => $plan
        ]);
    }

    public function destroy($id)
    {
        $plan = PlanEstudio::find($id);
        
        if (!$plan) {
            return response()->json([
                'success' => false,
                'message' => 'Plan de estudio no encontrado'
            ], 404);
        }

        $plan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Plan de estudio eliminado exitosamente'
        ]);
    }
}