<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CursoRequest;

use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\CursoDisciplina;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nome = !empty($request->query("nome")) ? $request->query('nome') : '';
        $descricao = !empty($request->query("descricao")) ? $request->query('descricao') : '';
        $status = strlen($request->query("status")) > 0 ? [$request->query("status")] : [0,1];

        $cursos = Curso::where('nome','LIKE','%'.$nome.'%')
                         ->where('descricao','LIKE','%'.$descricao.'%')
                         ->whereIn('status', $status)
                         ->paginate(6);


        return view('curso.index',[
            'cursos' => $cursos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoRequest $request)
    {
       $cursoCadastrado = Curso::create([
                                'nome' => $request['nome'],
                                'descricao' => $request['descricao'],
                                'status' => $request['status'],
                                'preco' => $request['preco'],
                                'observacao' => $request['observacao'],
                                'dt_cadastro' => date('Y-m-d')
                            ]);

        if($cursoCadastrado)
        {
            return redirect()->route('curso.index')->with('success','Curso cadastrado com sucesso!!');
        }
        else
        {
            return redirect()->route('curso.create')->with('error','Não foi possível cadastrar o curso!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $modelCurso = Curso::find($id);
        
        return view('curso.view', compact('modelCurso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $modelCurso = Curso::find($id);
        
        return view('curso.update', compact('modelCurso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoRequest $request, Curso $curso)
    {
        $cursoAtualizado = $curso->update([
                                'nome' => $request['nome'],
                                'descricao' => $request['descricao'],
                                'status' => $request['status'],
                                'preco' => $request['preco'],
                                'observacao' => $request['observacao']
                            ]);

        if($cursoAtualizado)
        {
            return redirect()->route('curso.index')->with('success','Curso atualizado com sucesso!!');
        }
        else
        {
            return redirect()->route('curso.index')->with('error','Não foi possível atualizar o curso!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

      /**
     * Add content
     */
    public function disciplinas(Curso $id)
    {
        $modelCurso = $id;
        $disciplinas = Disciplina::get();
        $disciplinasCadastradas = CursoDisciplina::select('id_disciplina')
                                                   ->where('id_curso', $modelCurso->id)->get();

        $arrayDisciplinas = [];

        foreach($disciplinasCadastradas as $key => $disciplina)
        {
            $arrayDisciplinas[] = $disciplina->id_disciplina;
        }

        return view('curso.disciplinas', compact('modelCurso','disciplinas','arrayDisciplinas'));
    }

     /**
     * Add content
     */
    public function addDisciplinas(Request $request)
    {

        $idCurso  = $request->id_curso;

        DB::beginTRansaction();

        try
        {
            $disciplinas = $request->disciplina;

            CursoDisciplina::where('id_curso',$idCurso)->delete();

            foreach($disciplinas as $key2 => $disciplina)
            {

                $salvou = CursoDisciplina::create([
                    'id_curso' => $idCurso,
                    'id_disciplina' => $disciplina
                ]
                );

                if(!$salvou)
                {
                    DB::rollBack();

                    return redirect()->route('curso.index')
                        ->with('error','Não foi possível atualizar os disciplinas!!'); 
                }

            }

            DB::commit();

            return redirect()->route('curso.index')
                             ->with('success','Disciplinas atualizadas com sucesso!!'); 

        }catch(Exception $e)
        {
            DB::rollBack();

            return redirect()->route('curso.index')
                             ->with('error', $e->getMessage()); 
        }

    }
}
