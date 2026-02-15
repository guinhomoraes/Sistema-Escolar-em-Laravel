<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Curso extends Model
{
    protected $table = "curso";
    protected $fillable = ['nome','descricao','status','dt_cadastro',
                           'observacao','preco'];


    public static function getAlunosByCurso($id_curso, $id_turma)
    {
         $cursos = DB::table('aluno_curso')
                                        ->select('aluno_curso.nota', 'users.name', 'aluno_curso.id', 'aluno_curso.nota',
                                        'aluno_turma.id_turma')
                                        ->join('curso','curso.id','=','aluno_curso.id_curso')
                                        ->join('aluno','aluno.id','=','aluno_curso.id_aluno')
                                        ->join('aluno_turma', 'aluno_turma.id_aluno','=', 'aluno.id')
                                        ->join('users','users.id','=','aluno.id_usuario')
                                        ->where('curso.id', $id_curso)
                                        ->where('aluno_turma.id_turma', $id_turma)
                                        ->get();

        return $cursos;
    }

    public static function podeEditarCurso($id_turma)
    {
        $dadosUser = Auth::user();

         $podeEditar = DB::table('turma')
                                        ->select('professor.id_usuario','turma.id')
                                        ->join('professor', 'professor.id','=', 'turma.id_professor')
                                        ->join('users','users.id','=','professor.id_usuario')
                                        ->where('users.id', $dadosUser->id)
                                        ->where('turma.id', $id_turma)
                                        ->get();

        return count($podeEditar) > 0 ? 1 : 0;
    }
}
