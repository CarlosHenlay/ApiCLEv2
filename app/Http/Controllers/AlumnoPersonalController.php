<?php

namespace App\Http\Controllers;

use App\Models\AlumnoPersonal;
use App\Models\Alumno;
use App\Models\Municipio;
use App\Models\Estado;
use Illuminate\Http\Request;

class AlumnoPersonalController extends Controller
{
    public function index()
    {
        $alumnosPersonales = AlumnoPersonal::with(['alumno', 'municipio', 'estado'])->get();
        return response()->json([
            'success' => true,
            'data' => $alumnosPersonales
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'alu_Id' => 'required|exists:alumnos,alu_Id|unique:alumnospersonales,alu_Id',
            'aluPer_TelPer' => 'nullable|string|max:15',
            'aluPer_TelCasa' => 'nullable|string|max:15',
            'aluPer_Correo' => 'nullable|email|max:30',
            'aluPer_CalleNum' => 'required|string|max:30',
            'aluPer_Col' => 'required|string|max:30',
            'aluPer_Loc' => 'required|string|max:30',
            'min_Id' => 'required|exists:municipios,mun_id',
            'est_Id' => 'required|exists:estados,est_id',
            'aluPer_TipSan' => 'nullable|string|max:15',
            'aluPer_FechNac' => 'required|date',
            'aluPer_NomTut' => 'nullable|string|max:50',
            'aluPer_TelTut' => 'nullable|string|max:15',
        ]);

        $alumnoPersonal = AlumnoPersonal::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Datos personales del alumno creados exitosamente',
            'data' => $alumnoPersonal
        ], 201);
    }

    public function show($id)
    {
        $alumnoPersonal = AlumnoPersonal::with(['alumno', 'municipio', 'estado'])->find($id);
        
        if (!$alumnoPersonal) {
            return response()->json([
                'success' => false,
                'message' => 'Datos personales del alumno no encontrados'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $alumnoPersonal
        ]);
    }

    public function update(Request $request, $id)
    {
        $alumnoPersonal = AlumnoPersonal::find($id);
        
        if (!$alumnoPersonal) {
            return response()->json([
                'success' => false,
                'message' => 'Datos personales del alumno no encontrados'
            ], 404);
        }

        $request->validate([
            'alu_Id' => 'required|exists:alumnos,alu_Id|unique:alumnospersonales,alu_Id,' . $alumnoPersonal->aluPer_Id . ',aluPer_Id',
            'aluPer_TelPer' => 'nullable|string|max:15',
            'aluPer_TelCasa' => 'nullable|string|max:15',
            'aluPer_Correo' => 'nullable|email|max:30',
            'aluPer_CalleNum' => 'required|string|max:30',
            'aluPer_Col' => 'required|string|max:30',
            'aluPer_Loc' => 'required|string|max:30',
            'min_Id' => 'required|exists:municipios,mun_id',
            'est_Id' => 'required|exists:estados,est_id',
            'aluPer_TipSan' => 'nullable|string|max:15',
            'aluPer_FechNac' => 'required|date',
            'aluPer_NomTut' => 'nullable|string|max:50',
            'aluPer_TelTut' => 'nullable|string|max:15',
        ]);

        $alumnoPersonal->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Datos personales del alumno actualizados exitosamente',
            'data' => $alumnoPersonal
        ]);
    }

    public function destroy($id)
    {
        $alumnoPersonal = AlumnoPersonal::find($id);
        
        if (!$alumnoPersonal) {
            return response()->json([
                'success' => false,
                'message' => 'Datos personales del alumno no encontrados'
            ], 404);
        }

        $alumnoPersonal->delete();

        return response()->json([
            'success' => true,
            'message' => 'Datos personales del alumno eliminados exitosamente'
        ]);
    }
}