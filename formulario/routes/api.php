<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FiscalController;

Route::get('/fiscal/registros', [FiscalController::class, 'obtenerRegistros'])->middleware('check.session');