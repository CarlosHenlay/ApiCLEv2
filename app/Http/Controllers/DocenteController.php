<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Municipio;
use App\Models\Estado;
use App\Models\Usuario;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::with(['municipio', 'estado', 'usuario'])->get();
        return response()->json([
            'success' => true,
            'data' => $docentes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'doc_Nom' => 'required|string|max:20',
            'doc_AppPat' => 'required|string|max:20',
            'doc_AppMat' => 'nullable|string|max:20',
            'doc_Ges' => 'nullable|string|max:15',
            'doc_ComEst' => 'nullable|string|max:30',
            'doc_TelPer' => 'nullable|string|max:15',
            'doc_TelCasa' => 'nullable|string|max:15',
            'doc_Correo' => 'nullable|email|max:30',
            'doc_CalleNum' => 'required|string|max:30',
            'doc_Col' => 'required|string|max:30',
            'doc_Loc' => 'required|string|max:30',
            'min_Id' => 'required|exists:municipios,mun_id',
            'est_Id' => 'required|exists:estados,est_id',
            'doc_FechIng' => 'required|date',
            'doc_Obs' => 'nullable|string|max:50',
            'usu_Id' => 'required|exists:usuarios,usu_Id',
        ]);

        $docente = Docente::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Docente creado exitosamente',
            'data' => $docente
        ], 201);
    }

    public function show($id)
    {
        $docente = Docente::with(['municipio', 'estado', 'usuario'])->find($id);
        
        if (!$docente) {
            return response()->json([
                'success' => false,
                'message' => 'Docente no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $docente
        ]);
    }

    public function update(Request $request, $id)
    {
        $docente = Docente::find($id);
        
        if (!$docente) {
            return response()->json([
                'success' => false,
                'message' => 'Docente no encontrado'
            ], 404);
        }

        $request->validate([
            'doc_Nom' => 'required|string|max:20',
            'doc_AppPat' => 'required|string|max:20',
            'doc_AppMat' => 'nullable|string|max:20',
            'doc_Ges' => 'nullable|string|max:15',
            'doc_ComEst' => 'nullable|string|max:30',
            'doc_TelPer' => 'nullable|string|max:15',
            'doc_TelCasa' => 'nullable|string|max:15',
            'doc_Correo' => 'nullable|email|max:30',
            'doc_CalleNum' => 'required|string|max:30',
            'doc_Col' => 'required|string|max:30',
            'doc_Loc' => 'required|string|max:30',
            'min_Id' => 'required|exists:municipios,mun_id',
            'est_Id' => 'required|exists:estados,est_id',
            'doc_FechIng' => 'required|date',
            'doc_Obs' => 'nullable|string|max:50',
            'usu_Id' => 'required|exists:usuarios,usu_Id',
        ]);

        $docente->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Docente actualizado exitosamente',
            'data' => $docente
        ]);
    }

    public function destroy($id)
    {
        $docente = Docente::find($id);
        
        if (!$docente) {
            return response()->json([
                'success' => false,
                'message' => 'Docente no encontrado'
            ], 404);
        }

        $docente->delete();

        return response()->json([
            'success' => true,
            'message' => 'Docente eliminado exitosamente'
        ]);
    }
}