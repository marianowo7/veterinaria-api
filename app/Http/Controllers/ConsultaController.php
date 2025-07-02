<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    public function index() {
        return Consulta::all();
    }

    public function show($id) {
        return Consulta::findOrFail($id);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'cuit_duenio' => 'required|string|size:11',
            'id_animal' => 'required|integer|exists:mascota,id_mascota',
            'descripcion_consulta' => 'required|string|max:500',
            'cuit_veterinario' => 'required|string|size:11'
        ]);
        return Consulta::create($validated);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'cuit_duenio' => 'required|string|size:11',
            'id_animal' => 'required|integer|exists:mascota,id_mascota',
            'descripcion_consulta' => 'required|string|max:500',
            'cuit_veterinario' => 'required|string|size:11'
        ]);

        $consulta = Consulta::findOrFail($id);
        $consulta->update($validated);
        return $consulta;
    }


    public function destroy($id) {
        $Consulta = Consulta::findOrFail($id);
        $Consulta->delete();
        return response()->json(['mensaje' => 'Consulta eliminada']);
    }

}
