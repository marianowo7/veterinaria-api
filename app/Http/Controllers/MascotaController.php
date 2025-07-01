<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        return Mascota::all();
    }

    public function show($id) {
        return Mascota::findOrFail($id);
    }

    public function store(Request $request) {
        return Mascota::create($request->all());
    }

    public function update(Request $request, $id) {
        $mascota = Mascota::findOrFail($id);
        $mascota->update($request->all());
        return $mascota;
    }

    public function destroy($id) {
        $mascota = Mascota::findOrFail($id);
        $mascota->delete();
        return response()->json(['mensaje' => 'Mascota eliminada']);
    }

}
