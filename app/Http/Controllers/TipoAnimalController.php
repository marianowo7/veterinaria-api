<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoAnimal;

class TipoAnimalController extends Controller
{
    public function index(){
        return TipoAnimal::all();
    }

    public function show($id) {
        return TipoAnimal::findOrFail($id);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'descrip_tipo_animal' => 'required|string|max:50|unique:tipo_animal,descrip_tipo_animal'
        ]);
        return TipoAnimal::create($validated);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'descrip_tipo_animal' => 'required|string|max:50|unique:tipo_animal,descrip_tipo_animal,' . $id . ',id_tipo_animal'
        ]);

        $tipo = TipoAnimal::findOrFail($id);
        $tipo->update($validated);
        return $tipo;
    }


    public function destroy($id) {
        $tipoAnimal = TipoAnimal::findOrFail($id);
        $tipoAnimal->delete();
        return response()->json(['mensaje' => 'Tipo de animal eliminado']);
    }

}
