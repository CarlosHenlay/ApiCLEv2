<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Grupo;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::with('grupo')->get();
        return response()->json([
            'success' => true,
            'data' => $inscripciones
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ins_Ctr' => 'required|string|max:12',
            'gru_Id' => 'required|exists:grupos,gru_Id',
            'ins_Fech' => 'required|date',
            'ins_Rec' => 'required|string|max:15',
            'ins_Mon' => 'required|numeric',
            'ins_Per' => 'required|string|max:12',
            'ins_An' => 'required|integer',
            'ins_P1' => 'required|integer',
            'ins_P2' => 'required|integer',
            'ins_P3' => 'required|integer',
            'ins_P4' => 'required|integer',
            'ins_PF' => 'required|integer',
            'ins_Obs' => 'nullable|string|max:30',
        ]);

        $inscripcion = Inscripcion::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Inscripción creada exitosamente',
            'data' => $inscripcion
        ], 201);
    }

    public function show($id)
    {
        $inscripcion = Inscripcion::with('grupo')->find($id);
        
        if (!$inscripcion) {
            return response()->json([
                'success' => false,
                'message' => 'Inscripción no encontrada'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $inscripcion
        ]);
    }

    public function update(Request $request, $id)
    {
        $inscripcion = Inscripcion::find($id);
        
        if (!$inscripcion) {
            return response()->json([
                'success' => false,
                'message' => 'Inscripción no encontrada'
            ], 404);
        }

        $request->validate([
            'ins_Ctr' => 'required|string|max:12',
            'gru_Id' => 'required|exists:grupos,gru_Id',
            'ins_Fech' => 'required|date',
            'ins_Rec' => 'required|string|max:15',
            'ins_Mon' => 'required|numeric',
            'ins_Per' => 'required|string|max:12',
            'ins_An' => 'required|integer',
            'ins_P1' => 'required|integer',
            'ins_P2' => 'required|integer',
            'ins_P3' => 'required|integer',
            'ins_P4' => 'required|integer',
            'ins_PF' => 'required|integer',
            'ins_Obs' => 'nullable|string|max:30',
        ]);

        $inscripcion->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Inscripción actualizada exitosamente',
            'data' => $inscripcion
        ]);
    }

    public function destroy($id)
    {
        $inscripcion = Inscripcion::find($id);
        
        if (!$inscripcion) {
            return response()->json([
                'success' => false,
                'message' => 'Inscripción no encontrada'
            ], 404);
        }

        $inscripcion->delete();

        return response()->json([
            'success' => true,
            'message' => 'Inscripción eliminada exitosamente'
        ]);
    }
}