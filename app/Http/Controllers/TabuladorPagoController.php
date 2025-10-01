<?php

namespace App\Http\Controllers;

use App\Models\TabuladorPago;
use Illuminate\Http\Request;

class TabuladorPagoController extends Controller
{
    public function index()
    {
        $tabuladores = TabuladorPago::all();
        return response()->json([
            'success' => true,
            'data' => $tabuladores
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tab_NomTab' => 'required|string|max:30',
            'tab_Mon' => 'required|numeric',
            'tab_Obs' => 'nullable|string|max:30',
        ]);

        $tabulador = TabuladorPago::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Tabulador de pago creado exitosamente',
            'data' => $tabulador
        ], 201);
    }

    public function show($id)
    {
        $tabulador = TabuladorPago::find($id);
        
        if (!$tabulador) {
            return response()->json([
                'success' => false,
                'message' => 'Tabulador de pago no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $tabulador
        ]);
    }

    public function update(Request $request, $id)
    {
        $tabulador = TabuladorPago::find($id);
        
        if (!$tabulador) {
            return response()->json([
                'success' => false,
                'message' => 'Tabulador de pago no encontrado'
            ], 404);
        }

        $request->validate([
            'tab_NomTab' => 'required|string|max:30',
            'tab_Mon' => 'required|numeric',
            'tab_Obs' => 'nullable|string|max:30',
        ]);

        $tabulador->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Tabulador de pago actualizado exitosamente',
            'data' => $tabulador
        ]);
    }

    public function destroy($id)
    {
        $tabulador = TabuladorPago::find($id);
        
        if (!$tabulador) {
            return response()->json([
                'success' => false,
                'message' => 'Tabulador de pago no encontrado'
            ], 404);
        }

        $tabulador->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tabulador de pago eliminado exitosamente'
        ]);
    }
}