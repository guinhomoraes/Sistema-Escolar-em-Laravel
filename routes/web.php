<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TipoConteudoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EscolaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashBoardController::class, 'index']);

Route::get('/curso/disciplinas/{id}', [CursoController::class,'disciplinas'])
->name('curso.disciplinas');
Route::post('/curso/add-diciplinas', [CursoController::class,'addDisciplinas'])
->name('curso.add-disciplinas');
Route::resource('/curso', CursoController::class);

Route::resource('/tipo-conteudo', TipoConteudoController::class);
Route::resource('/cargo', CargoController::class);

Route::get('/disciplina/conteudos/{id}', [DisciplinaController::class,'conteudos'])
->name('disciplina.conteudos');
Route::post('/disciplina/add-conteudos', [DisciplinaController::class,'addConteudos'])
->name('disciplina.add-conteudos');
Route::resource('/disciplina', DisciplinaController::class);

Route::resource('/escola', EscolaController::class);
