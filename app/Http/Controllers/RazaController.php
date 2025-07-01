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
        return Raza::create($request->all());
    }

    public function update(Request $request, $id) {
        $Raza = Raza::findOrFail($id);
        $Raza->update($request->all());
        return $Raza;
    }

    public function destroy($id) {
        $Raza = Raza::findOrFail($id);
        $Raza->delete();
        return response()->json(['mensaje' => 'Raza eliminada']);
    }

}
