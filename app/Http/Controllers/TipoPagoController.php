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
        return TipoPago::create($request->all());
    }

    public function update(Request $request, $id) {
        $TipoPago = TipoPago::findOrFail($id);
        $TipoPago->update($request->all());
        return $TipoPago;
    }

    public function destroy($id) {
        $TipoPago = TipoPago::findOrFail($id);
        $TipoPago->delete();
        return response()->json(['mensaje' => 'TipoPago eliminada']);
    }

}
