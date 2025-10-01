<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
    public function index()
    {
        $parametros = Parametro::all();
        return view('parametros.index', compact('parametros'));
    }

    public function create()
    {
        return view('parametros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'par_NomPar' => 'required|string|max:80',
            'par_Val1' => 'required|string|max:80',
            'par_Val2' => 'nullable|string|max:80',
            'par_Val3' => 'nullable|string|max:80',
            'par_Obs' => 'nullable|string|max:30',
        ]);

        Parametro::create($request->all());

        return redirect()->route('parametros.index')
            ->with('success', 'Parámetro creado exitosamente.');
    }

    public function show(Parametro $parametro)
    {
        return view('parametros.show', compact('parametro'));
    }

    public function edit(Parametro $parametro)
    {
        return view('parametros.edit', compact('parametro'));
    }

    public function update(Request $request, Parametro $parametro)
    {
        $request->validate([
            'par_NomPar' => 'required|string|max:80',
            'par_Val1' => 'required|string|max:80',
            'par_Val2' => 'nullable|string|max:80',
            'par_Val3' => 'nullable|string|max:80',
            'par_Obs' => 'nullable|string|max:30',
        ]);

        $parametro->update($request->all());

        return redirect()->route('parametros.index')
            ->with('success', 'Parámetro actualizado exitosamente.');
    }

    public function destroy(Parametro $parametro)
    {
        $parametro->delete();

        return redirect()->route('parametros.index')
            ->with('success', 'Parámetro eliminado exitosamente.');
    }
}