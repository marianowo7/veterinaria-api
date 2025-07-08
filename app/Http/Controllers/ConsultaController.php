<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consulta;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ConsultaController extends Controller
{
    use AuthorizesRequests;
    public function index() {
        return Consulta::with(['mascota', 'medicamentos', 'veterinario'])->get();
    }

    public function show($id) {
        $consulta = Consulta::with('mascota')->findOrFail($id);
        $this->authorize('view', $consulta);
        return $consulta;
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
        $consulta = Consulta::with('mascota')->findOrFail($id);
        $this->authorize('update', $consulta);
        $validated = $request->validate([
            'cuit_duenio' => 'required|string|size:11',
            'id_animal' => 'required|integer|exists:mascota,id_mascota',
            'descripcion_consulta' => 'required|string|max:500',
            'cuit_veterinario' => 'required|string|size:11'
        ]);
        $consulta->update($validated);
        return $consulta;
    }

    public function getConsultasByMascota($id) {
        $mascota = \App\Models\Mascota::findOrFail($id);
        $this->authorize('view', $mascota);
        return $mascota->consultas()->with('veterinario')->get();
    }

    public function destroy($id) {
        $consulta = Consulta::with('mascota')->findOrFail($id);
        $this->authorize('delete', $consulta);

        $consulta->delete();
        return response()->json(['mensaje' => 'Consulta eliminada']);
    }

}
