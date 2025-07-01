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
        return Consulta::create($request->all());
    }

    public function update(Request $request, $id) {
        $Consulta = Consulta::findOrFail($id);
        $Consulta->update($request->all());
        return $Consulta;
    }

    public function destroy($id) {
        $Consulta = Consulta::findOrFail($id);
        $Consulta->delete();
        return response()->json(['mensaje' => 'Consulta eliminada']);
    }

}
