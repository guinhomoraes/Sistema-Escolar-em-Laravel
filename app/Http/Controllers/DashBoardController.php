<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\Curso;
use App\Models\Professor;
use App\Models\Turma;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contadorEscola = Escola::count();
        $contadorCurso = Curso::count();
        $contadorTurma = Turma::count();
        $contadorProfessor = Professor::count();

        return view('dashboard.index', compact('contadorEscola','contadorCurso','contadorTurma',
        'contadorProfessor'));
    }
}
