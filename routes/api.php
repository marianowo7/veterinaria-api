<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\TipoAnimalController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\TipoPagoController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ConsultaMedicamentoController;
use App\Http\Controllers\PagoConsultaController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

//autenticación
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//auth sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/usuario', function (Request $request) {
        return $request->user(); 
    });
    Route::post('/mascotas', [MascotaController::class, 'store']);
    Route::get('/mis-mascotas', function (Request $request) {
        return $request->user()->mascotas;
    });

    //admin, veterinario
    Route::middleware(['rol:admin,veterinario'])->group(function () {
        Route::get('/mascotas',[MascotaController::class, 'index']);
        Route::put('/mascotas/{id}', [MascotaController::class, 'update']);
        Route::delete('/mascotas/{id}', [MascotaController::class, 'destroy']);

    });

    //solo vet
    Route::middleware(['rol:veterinario'])->group(function () {
        Route::get('/consultas', [ConsultaController::class, 'index']);
        Route::post('/consultas', [ConsultaController::class, 'store']);
        
        Route::get('/medicamentos', [MedicamentoController::class, 'index']);
        Route::post('/medicamentos', [MedicamentoController::class, 'store']);

        //consultas-medicamento
        Route::get('/consulta-medicamento', [ConsultaMedicamentoController::class, 'index']);
        Route::post('/consulta-medicamento', [ConsultaMedicamentoController::class, 'store']);
        Route::put('/consulta-medicamento/{id_medicamento}/{id_consulta}', [ConsultaMedicamentoController::class, 'update']);
        Route::delete('/consulta-medicamento/{id_medicamento}/{id_consulta}', [ConsultaMedicamentoController::class, 'destroy']);

        //pago-consultas
        Route::get('/pago-consultas', [PagoConsultaController::class, 'index']);
        Route::post('/pago-consultas', [PagoConsultaController::class, 'store']);
        Route::put('/pago-consultas/{id}', [PagoConsultaController::class, 'update']);
        Route::delete('/pago-consultas/{id}', [PagoConsultaController::class, 'destroy']);

    });
    
});

//tipo-animal
Route::get('/tipo-animales', [TipoAnimalController::class, 'index']);
Route::get('/razas', [RazaController::class, 'index']);
Route::get('/tipo-pago', [TipoPagoController::class, 'index']);

Route::middleware(['auth:sanctum', 'rol:admin'])->group(function () {
    //razas
    Route::post('/razas', [RazaController::class, 'store']);
    Route::put('/razas/{id}', [RazaController::class, 'update']);
    Route::delete('/razas/{id}', [RazaController::class, 'destroy']);

    //tipo-animal
    Route::post('/tipo-animales', [TipoAnimalController::class, 'store']);
    Route::put('/tipo-animales/{id}', [TipoAnimalController::class, 'update']);
    Route::delete('/tipo-animales/{id}', [TipoAnimalController::class, 'destroy']);
    //tipo-pago
    Route::post('/tipo-pago', [TipoPagoController::class, 'store']);
    Route::put('/tipo-pago/{id}', [TipoPagoController::class, 'update']);
    Route::delete('/tipo-pago/{id}', [TipoPagoController::class, 'destroy']);

    //veterinarios
    Route::get('/veterinarios', [VeterinarioController::class, 'index']);
    Route::post('/veterinarios', [VeterinarioController::class, 'store']);
    Route::put('/veterinarios/{id}', [VeterinarioController::class, 'update']);
    Route::delete('/veterinarios/{id}', [VeterinarioController::class, 'destroy']);
});