<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use App\Models\Professor;
use App\Models\Turma;
use App\Models\Escola;
use App\Models\Curso;
use App\Models\TurmaCurso;
use App\Models\User;
use App\Models\Aluno;
use App\Models\AlunoTurma;
use App\Models\AlunoCurso;
use App\Models\AlunoDisciplina;
use App\Models\CursoDisciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id_escola = !empty($request->query("id_escola")) ? $request->query('id_escola') : null;
        $id_professor = !empty($request->query("id_professor")) ? $request->query('id_professor') : null;
        $codigo = !empty($request->query("nome")) ? $request->query('nome') : null;

        $escolas = Escola::get();
        $professores = Professor::get();

        $turmas = Turma::query()
                        ->when(!empty($id_professor), function($query, $id_professor){
                            return $query->where('id_professor',$id_professor);
                        })
                        ->when(!empty($id_escola), function($query, $id_escola){
                            return $query->where('id_escola',$id_escola);
                        })
                        ->where('nome','LIKE','%'.$codigo.'%')
                        ->paginate(6);


        return view('turma.index',[
            'turmas' => $turmas,
            'escolas' => $escolas,
            'professores' => $professores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $escolas = Escola::get();
        $professores = Professor::get();

        return view('turma.create',[
            'escolas' => $escolas,
            'professores' => $professores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TurmaRequest $request)
    {
        $administrativo = Turma::create([
            'id_professor' => $request['id_professor'],
            'id_escola' => $request['id_escola'],
            'nome' => $request['nome'],
            'descricao' => $request['descricao'],
            'dt_inicio' => $request['dt_inicio'],
            'dt_termino' => $request['dt_termino'],
            'status' => $request['status'],
            'observacao' => $request['observacao'],
        ]);

        if($administrativo)
        {
            return redirect()->route('turma.index')
                             ->with('success','Turma cadastrada com sucesso!!');   
        }
        else
        {
            return redirect()->route('turma.index')
                             ->with('error','Não foi possível cadastrar a Turma!!');   
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Turma $turma)
    {
        $modelTurma = $turma;
        $cursosJaVinculados = DB::table('turma_curso')
                                        ->select('curso.nome','curso.descricao')
                                        ->join('curso','curso.id','=','turma_curso.id_curso')
                                        ->join('turma','turma.id','=','turma_curso.id_turma')
                                        ->where('turma.id', $modelTurma->id)
                                        ->get();

        return view('turma.view',[
            'modelTurma' => $modelTurma,
            'cursosJaVinculados' => $cursosJaVinculados
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turma $turma)
    {
        $modelTurma = $turma;
        $escolas = Escola::get();
        $professores = Professor::get();

        return view('turma.update',[
            'modelTurma' => $modelTurma,
            'escolas' => $escolas,
            'professores' => $professores
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TurmaRequest $request, Turma $turma)
    {
        $administrativo = $turma->update([
            'id_professor' => $request['id_professor'],
            'id_escola' => $request['id_escola'],
            'nome' => $request['nome'],
            'descricao' => $request['descricao'],
            'dt_inicio' => $request['dt_inicio'],
            'dt_termino' => $request['dt_termino'],
            'status' => $request['status'],
            'observacao' => $request['observacao'],
        ]);

        if($administrativo)
        {
            return redirect()->route('turma.index')
                             ->with('success','Turma atualizada com sucesso!!');   
        }
        else
        {
            return redirect()->route('turma.index')
                             ->with('error','Não foi possível atualizar a Turma!!');   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turma $turma)
    {
        //
    }

      /**
     * Add content
     */
    public function cursos(Turma $id)
    {
        $modelTurma = $id;
        $cursos = Curso::where('status',1)->get();

        $cursosJaVinculados = TurmaCurso::where('id_turma', $modelTurma->id)->get();
        $arrCursoAdicionados = [];

        foreach($cursosJaVinculados as $key => $cursoVinc)
        {
            $arrCursoAdicionados[] = $cursoVinc->id_curso;   
        }

        return view('turma.cursos', compact('modelTurma','cursos','arrCursoAdicionados'));
    }

     /**
     * Add content
     */
    public function addCursos(Request $request)
    {

        $cursosJaVinculados = TurmaCurso::where('id_turma', $request['id_turma'])->get();
        $arrCursoAdicionados = [];

        foreach($cursosJaVinculados as $key => $cursoVinc)
        {
            $arrCursoAdicionados[] = $cursoVinc->id_curso;   
        }

        $arrCursoRequest = $request['Cursos'];

        DB::beginTRansaction();

        try
        {
            foreach($arrCursoAdicionados as $key => $jaAdicionado)
            {
                if(!in_array($jaAdicionado, $arrCursoRequest))
                {
                    $cursoRemover = TurmaCurso::where('id_turma', $request['id_turma'])
                                                ->where('id_curso', $jaAdicionado);

                    if($cursoRemover)
                    {
                        $cursoRemover->delete();   
                    }
                }
            }

            foreach($arrCursoRequest as $key => $vaiSerAdicionado)
            {
                if(!in_array($vaiSerAdicionado, $arrCursoAdicionados))
                {
                    $turmaCurso = TurmaCurso::create([
                            'id_turma' => $request['id_turma'],
                            'id_curso' => $vaiSerAdicionado
                    ]);

                    if(!$turmaCurso)
                    {
                        DB::rollBack();
                        return redirect()->route('turma.index')
                             ->with('success','Não foi possível atualizar os Cursos!!'); 
                    }
                }
            }

            DB::commit();

            return redirect()->route('turma.index')
                             ->with('success','Cursos atualizados com sucesso!!'); 

        }catch(Exception $e)
        {
            DB::rollBack();

            return redirect()->route('turma.index')
                             ->with('error', $e->getMessage()); 
        }


        return view('turma.cursos');
    }


    public function alunos(Turma $id)
    {
        $modelTurma = $id;
        $alunos = User::where('status',1)->get();

        $alunosJaVinculados = AlunoTurma::where('id_turma', $modelTurma->id)->get();
        $arrAlunosAdicionados = [];

        foreach($alunosJaVinculados as $key => $alunoVinc)
        {
            $user = Aluno::find($alunoVinc->id_aluno);
            $arrAlunosAdicionados[] = $user->id_usuario;   
        }

        return view('turma.alunos', compact('modelTurma','alunos','arrAlunosAdicionados'));
    }

     /**
     * Add content
     */
    public function addAlunos(Request $request)
    {

        $alunosJaVinculados = AlunoTurma::where('id_turma', $request['id_turma'])->get();
        $arrAlunosAdicionados = [];
        $modelTurma = Turma::find($request['id_turma']);

        foreach($alunosJaVinculados as $key => $alunoVinc)
        {
            $arrAlunosAdicionados[] = $alunoVinc->id_aluno;   
        }

        $arrAlunoRequest = $request['Aluno'];

        DB::beginTRansaction();

        try
        {

            foreach($arrAlunoRequest as $key => $vaiSerAdicionado)
            {

                $alunoExiste = Aluno::where('id_usuario', $vaiSerAdicionado)->first();

                if(!isset($alunoExiste->id))
                {

                    $aluno = Aluno::create([
                        'id_usuario' => $vaiSerAdicionado,
                        'id_escola' => $modelTurma->id_escola,
                        'registro' => 'ALUN'.$vaiSerAdicionado
                    ]);  
                    
                }
                else
                {
                    $aluno = $alunoExiste;   
                }

                if(!in_array($aluno->id, $arrAlunosAdicionados))
                {
                    $turmaAluno = AlunoTurma::create([
                            'id_turma' => $request['id_turma'],
                            'id_aluno' => $aluno->id
                    ]);

                    $cursos = TurmaCurso::where('id_turma',$request['id_turma'])->get();

                    if(count($cursos) > 0)
                    {
                        foreach($cursos as $keyCurso => $curso)
                        {
                            $alunoCursoConsulta = AlunoCurso::where('id_aluno', $aluno->id)
                                                              ->where('id_curso', $curso->id_curso)
                                                              ->get();


                            if(count($alunoCursoConsulta) == 0) 
                            {
                                $cursoAluno = AlunoCurso::create([
                                        'id_curso' => $curso->id_curso,
                                        'id_aluno' => $aluno->id,
                                        'status' => 0,
                                        'progresso' => 0
                                ]);

                                $cursoDisciplina = CursoDisciplina::where('id_curso', $curso->id_curso)->get();

                                if(count($cursoDisciplina) > 0)
                                {
                                    foreach($cursoDisciplina as $keyDisc => $disciplina)
                                    {

                                        $alunoDisciplina = AlunoDisciplina::where('id_aluno', $aluno->id)
                                                                            ->where('id_disciplina', $disciplina->id_disciplina)
                                                                            ->get();

                                        if(count($alunoDisciplina) == 0)
                                        {
                                            $disciplinaAluno = AlunoDisciplina::create([
                                                    'id_aluno' => $aluno->id,
                                                    'id_disciplina' => $disciplina->id_disciplina,
                                                    'status' => 0
                                            ]);
                                        }
                                    }   
                                }
                            }
                        }   
                    }

                }

            }

            foreach($arrAlunosAdicionados as $key => $jaAdicionado)
            {
                $alunoAdicionadoModel = Aluno::find($jaAdicionado);

                if(!in_array($alunoAdicionadoModel->id_usuario, $arrAlunoRequest))
                {
                    $alunoRemover = AlunoTurma::where('id_turma', $request['id_turma'])
                                                ->where('id_aluno', $jaAdicionado);

                    if($alunoRemover)
                    {
                        $alunoRemover->delete();   
                    }
                }
            }

            DB::commit();

            return redirect()->route('turma.index')
                             ->with('success','Alunos atualizados com sucesso!!'); 

        }catch(Exception $e)
        {
            DB::rollBack();

            return redirect()->route('turma.index')
                             ->with('error', $e->getMessage()); 
        }


        return view('turma.cursos');
    }
}
