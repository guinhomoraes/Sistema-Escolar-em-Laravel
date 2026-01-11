<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TipoConteudoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');

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
    Route::resource('/usuario', UsuarioController::class);
    Route::resource('/administrativo', AdministrativoController::class);
    Route::resource('/professor', ProfessorController::class);
    Route::resource('/turma', TurmaController::class);

});

require __DIR__.'/auth.php';
