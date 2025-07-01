<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConsultaMedicamento;

class ConsultaMedicamentoController extends Controller
{
    public function index(){
        return ConsultaMedicamento::all();
    }


    public function store(Request $request) {
        return ConsultaMedicamento::create($request->all());
    }
    
    public function show($id_medicamento, $id_consulta) {
        $consulta = ConsultaMedicamento::where('id_medicamento', $id_medicamento)
                        ->where('id_consulta', $id_consulta)
                        ->firstOrFail();
        return $consulta;
    }

    public function update(Request $request, $id_medicamento, $id_consulta) {
        $consulta = ConsultaMedicamento::where('id_medicamento', $id_medicamento)
                        ->where('id_consulta', $id_consulta)
                        ->firstOrFail();
        $consulta->update($request->all());
        return $consulta;
    }

    public function destroy($id_medicamento, $id_consulta) {
        $consulta = ConsultaMedicamento::where('id_medicamento', $id_medicamento)
                        ->where('id_consulta', $id_consulta)
                        ->firstOrFail();
        $consulta->delete();
        return response()->json(['mensaje' => 'Consulta-Medicamento eliminada']);
    }

}
