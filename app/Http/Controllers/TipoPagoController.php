<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoPago;

class TipoPagoController extends Controller
{
    public function index(){
        return TipoPago::all();
    }

    public function show($id) {
        return TipoPago::findOrFail($id);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'descrip_tipo_pago' => 'required|string|max:50|unique:tipo_pago,descrip_tipo_pago'
        ]);

        return TipoPago::create($validated);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'descrip_tipo_pago' => 'required|string|max:50|unique:tipo_pago,descrip_tipo_pago,' . $id . ',id_tipo_pago'
        ]);
        $TipoPago = TipoPago::findOrFail($id);
        $TipoPago->update($validated);
        return $TipoPago;
    }

    public function destroy($id) {
        $TipoPago = TipoPago::findOrFail($id);
        $TipoPago->delete();
        return response()->json(['mensaje' => 'TipoPago eliminada']);
    }

}
