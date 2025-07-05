<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        return Mascota::all();
    }

    public function show(Mascota $mascota) {
        $this->authorize('view', $mascota);
        return $mascota;
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nombre_mascota' => 'required|string|max:50',
            'cuit_duenio' => 'required|string|size:11',
            'id_tipo_animal' => 'required|integer|exists:tipo_animal,id_tipo_animal',
            'peso_kg' => 'required|integer|min:0',
            'id_raza' => 'required|integer|exists:raza,id_raza'
        ]);
        $validated['user_id'] = auth()->id();
        $validated['cuit_duenio'] = auth()->id();
        return Mascota::create($validated);
    }


    public function update(Request $request, $id) {
        $validated = $request->validate([
            'nombre_mascota' => 'required|string|max:50',
            'cuit_duenio' => 'required|string|size:11',
            'id_tipo_animal' => 'required|integer|exists:tipo_animal,id_tipo_animal',
            'peso_kg' => 'required|integer|min:0',
            'id_raza' => 'required|integer|exists:raza,id_raza'
        ]);

        $mascota = Mascota::findOrFail($id);
        $mascota->update($validated);
        return $mascota;
    }


    public function destroy(Mascota $mascota) {
        $this->authorize('delete', $mascota);
        $mascota->delete();
        return response()->json(['message' => 'Mascota eliminada']);
    }

}
