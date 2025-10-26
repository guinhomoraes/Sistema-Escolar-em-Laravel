<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TipoConteudoController;
use App\Http\Controllers\CargoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashBoardController::class, 'index']);
Route::resource('/curso', CursoController::class);
Route::resource('/tipo-conteudo', TipoConteudoController::class);
Route::resource('/cargo', CargoController::class);