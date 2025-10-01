<?php

namespace App\Http\Controllers;

use App\Models\Deudor;
use App\Models\Alumno;
use Illuminate\Http\Request;

class DeudorController extends Controller
{
    public function index()
    {
        $deudores = Deudor::with('alumno')->get();
        return response()->json([
            'success' => true,
            'data' => $deudores
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'alu_Id' => 'required|exists:alumnos,alu_Id',
            'deu_Con' => 'required|string|max:80',
            'deu_Fech' => 'required|date',
            'deu_Per' => 'required|string|max:12',
            'deu_An' => 'required|integer',
            'deu_Obs' => 'nullable|string|max:30',
        ]);

        $deudor = Deudor::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Deudor registrado exitosamente',
            'data' => $deudor
        ], 201);
    }

    public function show($id)
    {
        $deudor = Deudor::with('alumno')->find($id);
        
        if (!$deudor) {
            return response()->json([
                'success' => false,
                'message' => 'Deudor no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $deudor
        ]);
    }

    public function update(Request $request, $id)
    {
        $deudor = Deudor::find($id);
        
        if (!$deudor) {
            return response()->json([
                'success' => false,
                'message' => 'Deudor no encontrado'
            ], 404);
        }

        $request->validate([
            'alu_Id' => 'required|exists:alumnos,alu_Id',
            'deu_Con' => 'required|string|max:80',
            'deu_Fech' => 'required|date',
            'deu_Per' => 'required|string|max:12',
            'deu_An' => 'required|integer',
            'deu_Obs' => 'nullable|string|max:30',
        ]);

        $deudor->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Deudor actualizado exitosamente',
            'data' => $deudor
        ]);
    }

    public function destroy($id)
    {
        $deudor = Deudor::find($id);
        
        if (!$deudor) {
            return response()->json([
                'success' => false,
                'message' => 'Deudor no encontrado'
            ], 404);
        }

        $deudor->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deudor eliminado exitosamente'
        ]);
    }
}