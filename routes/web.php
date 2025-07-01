<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\MascotaController;
use App\Http\Controllers\TipoAnimalController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\TipoPagoController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ConsultaMedicamentoController;
use App\Http\Controllers\PagoConsultaController;



Route::get('/mascotas', [MascotaController::class, 'index']);
Route::get('/tipo-animales', [TipoAnimalController::class, 'index']);
Route::get('/razas', [RazaController::class, 'index']);
Route::get('/tipo-pago', [TipoPagoController::class, 'index']);
Route::get('/medicamentos', [MedicamentoController::class, 'index']);
Route::get('/veterinarios', [VeterinarioController::class, 'index']);
Route::get('/consultas', [ConsultaController::class, 'index']);
Route::get('/consultas-medicamento', [ConsultaMedicamentoController::class, 'index']);
Route::get('/pago-consultas', [PagoConsultaController::class, 'index']);


