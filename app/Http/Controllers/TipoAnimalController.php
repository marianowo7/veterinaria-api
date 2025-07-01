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
        return TipoAnimal::create($request->all());
    }

    public function update(Request $request, $id) {
        $tipoAnimal = TipoAnimal::findOrFail($id);
        $tipoAnimal->update($request->all());
        return $tipoAnimal;
    }

    public function destroy($id) {
        $tipoAnimal = TipoAnimal::findOrFail($id);
        $tipoAnimal->delete();
        return response()->json(['mensaje' => 'Tipo de animal eliminado']);
    }

}
