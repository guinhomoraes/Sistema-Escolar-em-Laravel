<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use App\Models\Professor;
use App\Models\Turma;
use App\Models\Escola;
use Illuminate\Http\Request;

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

        return view('turma.view',[
            'modelTurma' => $modelTurma
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
}
