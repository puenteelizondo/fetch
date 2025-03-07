<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FiscalController;


Route::get('/', function () {
    return view("modules.auth.login");
})->name('login');

Route::get('/registrar/usuario', function () {
    return view('modules.auth.registro');
})->name('registro');


Route::post('/logear', [AuthController::class, 'logear'])->name('logear-usuario');
Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar-usuario');


Route::group(['middleware' => 'check.session'], function () {
    Route::get('/dashboard', function () {
        return view('modules.dashboard.Mostrar_Fiscal');
    });

    Route::post('/fiscal', [FiscalController::class, 'fiscal']);

    Route::get('/enviar-fiscal', function () {
        return view('modules.dashboard.Enviar_Fiscal', ['session' => session('info_usuario')]);
    })->name('enviar-fiscal');

    Route::get('/mostrar-fiscal', function () {
        return view('modules.dashboard.Mostrar_Fiscal');
    })->name('mostrar-fiscal');
});

