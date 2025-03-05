<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FiscalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/registro', [AuthController::class, 'registro'])->name('registro');


Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');



Route::post('/fiscal', [FiscalController::class, 'fiscal'])->name('fiscal');
