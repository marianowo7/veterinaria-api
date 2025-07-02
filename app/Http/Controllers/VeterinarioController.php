<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Veterinario;

class VeterinarioController extends Controller
{
    public function index(){
        return Veterinario::all();
    }

    public function show($id) {
        return Veterinario::findOrFail($id);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'cuit_vet' => 'required|string|max:11|unique:veterinario,cuit_vet',
            'nombre_vet' => 'required|string|max:50',
            'apellido_vet' => 'required|string|max:50',
            'horario_entrada' => 'required|string|max:5',
            'horario_salida' => 'required|string|max:5',
        ]);
        return Veterinario::create($validated);
    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'cuit_vet' => 'required|string|size:11|unique:veterinario,cuit_vet,' . $id . ',cuit_vet',
            'nombre_vet' => 'required|string|max:50',
            'apellido_vet' => 'required|string|max:50',
            'horario_entrada' => 'required|string|max:5',
            'horario_salida' => 'required|string|max:5'
        ]);
        $Veterinario = Veterinario::findOrFail($id);
        $Veterinario->update($validated);
        return $Veterinario;
    }

    public function destroy($id) {
        $Veterinario = Veterinario::findOrFail($id);
        $Veterinario->delete();
        return response()->json(['mensaje' => 'Veterinario eliminado']);
    }

}
