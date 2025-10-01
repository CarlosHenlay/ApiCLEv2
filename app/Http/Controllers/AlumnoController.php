<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\PlanEstudio;
use App\Models\TabuladorPago;
use App\Models\UsuarioAlumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with(['planEstudio', 'tabuladorPago', 'usuarioAlumno'])->get();
        return response()->json([
            'success' => true,
            'data' => $alumnos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'alu_NumCtr' => 'required|string|max:12|unique:alumnos',
            'alu_Curp' => 'nullable|string|max:20',
            'alu_Nom' => 'required|string|max:20',
            'alu_AppPat' => 'required|string|max:20',
            'alu_AppMat' => 'nullable|string|max:20',
            'alu_Sexo' => 'nullable|string|max:1',
            'pla_Id' => 'required|exists:planestudios,pla_Id',
            'alu_Sta' => 'required|string|max:1',
            'alu_Sem' => 'required|integer',
            'alu_IngPer' => 'required|string|max:12',
            'alu_IngAn' => 'required|integer',
            'alu_Ins' => 'required|string|max:1',
            'tab_Id' => 'required|exists:tabuladorpagos,tab_Id',
            'usuAlu_Id' => 'required|exists:usuariosalumnos,usuAlu_Id',
        ]);

        $alumno = Alumno::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Alumno creado exitosamente',
            'data' => $alumno
        ], 201);
    }

    public function show($id)
    {
        $alumno = Alumno::with(['planEstudio', 'tabuladorPago', 'usuarioAlumno'])->find($id);
        
        if (!$alumno) {
            return response()->json([
                'success' => false,
                'message' => 'Alumno no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $alumno
        ]);
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($id);
        
        if (!$alumno) {
            return response()->json([
                'success' => false,
                'message' => 'Alumno no encontrado'
            ], 404);
        }

        $request->validate([
            'alu_NumCtr' => 'required|string|max:12|unique:alumnos,alu_NumCtr,' . $alumno->alu_Id . ',alu_Id',
            'alu_Curp' => 'nullable|string|max:20',
            'alu_Nom' => 'required|string|max:20',
            'alu_AppPat' => 'required|string|max:20',
            'alu_AppMat' => 'nullable|string|max:20',
            'alu_Sexo' => 'nullable|string|max:1',
            'pla_Id' => 'required|exists:planestudios,pla_Id',
            'alu_Sta' => 'required|string|max:1',
            'alu_Sem' => 'required|integer',
            'alu_IngPer' => 'required|string|max:12',
            'alu_IngAn' => 'required|integer',
            'alu_Ins' => 'required|string|max:1',
            'tab_Id' => 'required|exists:tabuladorpagos,tab_Id',
            'usuAlu_Id' => 'required|exists:usuariosalumnos,usuAlu_Id',
        ]);

        $alumno->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Alumno actualizado exitosamente',
            'data' => $alumno
        ]);
    }

    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        
        if (!$alumno) {
            return response()->json([
                'success' => false,
                'message' => 'Alumno no encontrado'
            ], 404);
        }

        $alumno->delete();

        return response()->json([
            'success' => true,
            'message' => 'Alumno eliminado exitosamente'
        ]);
    }
}