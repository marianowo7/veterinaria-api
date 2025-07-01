<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicamento;

class MedicamentoController extends Controller
{
    public function index(){
        return Medicamento::all();
    }

       public function show($id) {
        return Medicamento::findOrFail($id);
    }

    public function store(Request $request) {
        return Medicamento::create($request->all());
    }

    public function update(Request $request, $id) {
        $Medicamento = Medicamento::findOrFail($id);
        $Medicamento->update($request->all());
        return $Medicamento;
    }

    public function destroy($id) {
        $Medicamento = Medicamento::findOrFail($id);
        $Medicamento->delete();
        return response()->json(['mensaje' => 'Medicamento eliminada']);
    }

}
