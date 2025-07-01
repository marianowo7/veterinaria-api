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
        return PagoConsulta::create($request->all());
    }

    public function update(Request $request, $id) {
        $PagoConsulta = PagoConsulta::findOrFail($id);
        $PagoConsulta->update($request->all());
        return $PagoConsulta;
    }

    public function destroy($id) {
        $PagoConsulta = PagoConsulta::findOrFail($id);
        $PagoConsulta->delete();
        return response()->json(['mensaje' => 'Pago-consulta eliminada']);
    }
 

}
