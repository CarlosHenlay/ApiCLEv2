<?php

namespace App\Http\Controllers;

use App\Models\HistoricoPago;
use App\Models\Alumno;
use App\Models\Reticula;
use Illuminate\Http\Request;

class HistoricoPagoController extends Controller
{
    public function index()
    {
        $historicosPagos = HistoricoPago::with(['alumno', 'reticula'])->get();
        return response()->json([
            'success' => true,
            'data' => $historicosPagos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'alu_Id' => 'required|exists:alumnos,alu_Id',
            'ret_Id' => 'required|exists:reticula,ret_Id',
            'hisPa_Fech' => 'required|date',
            'hisPa_Rec' => 'required|string|max:15',
            'hisPa_Mon' => 'required|numeric',
            'hisPa_Per' => 'required|string|max:12',
            'hisPa_An' => 'required|integer',
        ]);

        $historicoPago = HistoricoPago::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Histórico de pago creado exitosamente',
            'data' => $historicoPago
        ], 201);
    }

    public function show($id)
    {
        $historicoPago = HistoricoPago::with(['alumno', 'reticula'])->find($id);
        
        if (!$historicoPago) {
            return response()->json([
                'success' => false,
                'message' => 'Histórico de pago no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $historicoPago
        ]);
    }

    public function update(Request $request, $id)
    {
        $historicoPago = HistoricoPago::find($id);
        
        if (!$historicoPago) {
            return response()->json([
                'success' => false,
                'message' => 'Histórico de pago no encontrado'
            ], 404);
        }

        $request->validate([
            'alu_Id' => 'required|exists:alumnos,alu_Id',
            'ret_Id' => 'required|exists:reticula,ret_Id',
            'hisPa_Fech' => 'required|date',
            'hisPa_Rec' => 'required|string|max:15',
            'hisPa_Mon' => 'required|numeric',
            'hisPa_Per' => 'required|string|max:12',
            'hisPa_An' => 'required|integer',
        ]);

        $historicoPago->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Histórico de pago actualizado exitosamente',
            'data' => $historicoPago
        ]);
    }

    public function destroy($id)
    {
        $historicoPago = HistoricoPago::find($id);
        
        if (!$historicoPago) {
            return response()->json([
                'success' => false,
                'message' => 'Histórico de pago no encontrado'
            ], 404);
        }

        $historicoPago->delete();

        return response()->json([
            'success' => true,
            'message' => 'Histórico de pago eliminado exitosamente'
        ]);
    }
}