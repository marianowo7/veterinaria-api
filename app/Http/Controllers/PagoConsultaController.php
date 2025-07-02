<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagoConsulta;

class PagoConsultaController extends Controller
{
    public function index(){
        return PagoConsulta::all();
    }
   
    public function show($id) {
        return PagoConsulta::findOrFail($id);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_tipo_pago' => 'required|integer|exists:tipo_pago,id_tipo_pago',
            'importe' => 'required|numeric|min:0',
            'id_consulta' => 'required|integer|exists:consulta,id_consulta'
        ]);
        return PagoConsulta::create($validated);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'id_tipo_pago' => 'required|integer|exists:tipo_pago,id_tipo_pago',
            'importe' => 'required|numeric|min:0',
            'id_consulta' => 'required|integer|exists:consulta,id_consulta'
        ]);

        $pago = PagoConsulta::findOrFail($id);
        $pago->update($validated);
        return $pago;
    }

    public function destroy($id) {
        $PagoConsulta = PagoConsulta::findOrFail($id);
        $PagoConsulta->delete();
        return response()->json(['mensaje' => 'Pago-consulta eliminada']);
    }
 

}
