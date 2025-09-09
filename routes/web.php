<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\PorcaoController;

Route::get('/', fn() => view('home'))->name('home');

Route::get('/alimentos', [AlimentoController::class, 'index'])->name('alimentos.index');
Route::get('/alimentos/create', [AlimentoController::class, 'create'])->name('alimentos.create');
Route::post('/alimentos', [AlimentoController::class, 'store'])->name('alimentos.store');

Route::get('/porcoes/create', [PorcaoController::class, 'create'])->name('porcoes.create');
Route::post('/porcoes', [PorcaoController::class, 'store'])->name('porcoes.store');
