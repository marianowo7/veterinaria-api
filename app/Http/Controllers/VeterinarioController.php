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
        return Veterinario::create($request->all());
    }

    public function update(Request $request, $id) {
        $Veterinario = Veterinario::findOrFail($id);
        $Veterinario->update($request->all());
        return $Veterinario;
    }

    public function destroy($id) {
        $Veterinario = Veterinario::findOrFail($id);
        $Veterinario->delete();
        return response()->json(['mensaje' => 'Veterinario eliminado']);
    }

}
