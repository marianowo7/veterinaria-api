<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Raza;

class RazaController extends Controller
{
    public function index(){
        return Raza::all();
    }

    public function show($id) {
        return Raza::findOrFail($id);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'descrip_raza' => 'required|string|max:50|unique:raza,descrip_raza'
        ]);
        return Raza::create($validated);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'descrip_raza' => 'required|string|max:50|unique:raza,descrip_raza,' . $id . ',id_raza'
        ]);

        $raza = Raza::findOrFail($id);
        $raza->update($validated);
        return $raza;
    }


    public function destroy($id) {
        $Raza = Raza::findOrFail($id);
        $Raza->delete();
        return response()->json(['mensaje' => 'Raza eliminada']);
    }

}
