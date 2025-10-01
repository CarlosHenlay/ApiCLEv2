<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Reticula;
use App\Models\Docente;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::with(['reticula', 'docente'])->get();
        return response()->json([
            'success' => true,
            'data' => $grupos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ret_Id' => 'required|exists:reticula,ret_Id',
            'gru_Cgr' => 'required|string|max:5',
            'doc_Id' => 'required|exists:docentes,doc_Id',
            'gru_Lim' => 'required|integer',
            'gru_Can' => 'required|integer',
            'gru_HLu' => 'nullable|date_format:H:i:s',
            'gru_ALu' => 'nullable|string|max:5',
            'gru_HMa' => 'nullable|date_format:H:i:s',
            'gru_AMa' => 'nullable|string|max:5',
            'gru_HMi' => 'nullable|date_format:H:i:s',
            'gru_AMi' => 'nullable|string|max:5',
            'gru_HJu' => 'nullable|date_format:H:i:s',
            'gru_AJu' => 'nullable|string|max:5',
            'gru_HVi' => 'nullable|date_format:H:i:s',
            'gru_AVi' => 'nullable|string|max:5',
            'gru_HSa' => 'nullable|date_format:H:i:s',
            'gru_ASa' => 'nullable|string|max:5',
            'gru_Des' => 'nullable|string|max:30',
            'gru_Cla' => 'required|string|max:1',
        ]);

        $grupo = Grupo::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Grupo creado exitosamente',
            'data' => $grupo
        ], 201);
    }

    public function show($id)
    {
        $grupo = Grupo::with(['reticula', 'docente'])->find($id);
        
        if (!$grupo) {
            return response()->json([
                'success' => false,
                'message' => 'Grupo no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $grupo
        ]);
    }

    public function update(Request $request, $id)
    {
        $grupo = Grupo::find($id);
        
        if (!$grupo) {
            return response()->json([
                'success' => false,
                'message' => 'Grupo no encontrado'
            ], 404);
        }

        $request->validate([
            'ret_Id' => 'required|exists:reticula,ret_Id',
            'gru_Cgr' => 'required|string|max:5',
            'doc_Id' => 'required|exists:docentes,doc_Id',
            'gru_Lim' => 'required|integer',
            'gru_Can' => 'required|integer',
            'gru_HLu' => 'nullable|date_format:H:i:s',
            'gru_ALu' => 'nullable|string|max:5',
            'gru_HMa' => 'nullable|date_format:H:i:s',
            'gru_AMa' => 'nullable|string|max:5',
            'gru_HMi' => 'nullable|date_format:H:i:s',
            'gru_AMi' => 'nullable|string|max:5',
            'gru_HJu' => 'nullable|date_format:H:i:s',
            'gru_AJu' => 'nullable|string|max:5',
            'gru_HVi' => 'nullable|date_format:H:i:s',
            'gru_AVi' => 'nullable|string|max:5',
            'gru_HSa' => 'nullable|date_format:H:i:s',
            'gru_ASa' => 'nullable|string|max:5',
            'gru_Des' => 'nullable|string|max:30',
            'gru_Cla' => 'required|string|max:1',
        ]);

        $grupo->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Grupo actualizado exitosamente',
            'data' => $grupo
        ]);
    }

    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        
        if (!$grupo) {
            return response()->json([
                'success' => false,
                'message' => 'Grupo no encontrado'
            ], 404);
        }

        $grupo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Grupo eliminado exitosamente'
        ]);
    }
}