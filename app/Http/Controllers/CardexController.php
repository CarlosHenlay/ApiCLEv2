<?php

namespace App\Http\Controllers;

use App\Models\Cardex;
use App\Models\Alumno;
use App\Models\Reticula;
use Illuminate\Http\Request;

class CardexController extends Controller
{
    public function index()
    {
        $cardex = Cardex::with(['alumno', 'reticula'])->get();
        return response()->json([
            'success' => true,
            'data' => $cardex
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'alu_Id' => 'required|exists:alumnos,alu_Id',
            'ret_Id' => 'required|exists:reticula,ret_Id',
            'car_Cal' => 'required|integer',
            'car_Per' => 'required|string|max:12',
            'car_An' => 'required|integer',
            'car_Acr' => 'required|string|max:1',
            'car_Obs' => 'nullable|string|max:30',
        ]);

        $cardex = Cardex::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Registro de cardex creado exitosamente',
            'data' => $cardex
        ], 201);
    }

    public function show($id)
    {
        $cardex = Cardex::with(['alumno', 'reticula'])->find($id);
        
        if (!$cardex) {
            return response()->json([
                'success' => false,
                'message' => 'Registro de cardex no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $cardex
        ]);
    }

    public function update(Request $request, $id)
    {
        $cardex = Cardex::find($id);
        
        if (!$cardex) {
            return response()->json([
                'success' => false,
                'message' => 'Registro de cardex no encontrado'
            ], 404);
        }

        $request->validate([
            'alu_Id' => 'required|exists:alumnos,alu_Id',
            'ret_Id' => 'required|exists:reticula,ret_Id',
            'car_Cal' => 'required|integer',
            'car_Per' => 'required|string|max:12',
            'car_An' => 'required|integer',
            'car_Acr' => 'required|string|max:1',
            'car_Obs' => 'nullable|string|max:30',
        ]);

        $cardex->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Registro de cardex actualizado exitosamente',
            'data' => $cardex
        ]);
    }

    public function destroy($id)
    {
        $cardex = Cardex::find($id);
        
        if (!$cardex) {
            return response()->json([
                'success' => false,
                'message' => 'Registro de cardex no encontrado'
            ], 404);
        }

        $cardex->delete();

        return response()->json([
            'success' => true,
            'message' => 'Registro de cardex eliminado exitosamente'
        ]);
    }
}