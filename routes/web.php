<?php

use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\AtendimentosController;




Route::get('/', function () {
    return view('home');
});

Route::get('/', [MedicosController::class, 'show']);
Route::get('/', [AtendimentosController::class, 'show']);
Route::get('/', [PacientesController::class, 'show']);





Route::resource('/medicos', 'MedicosController');
Route::resource('/pacientes', 'PacientesController');


Route::resource('/atendimentos', 'AtendimentosController');
