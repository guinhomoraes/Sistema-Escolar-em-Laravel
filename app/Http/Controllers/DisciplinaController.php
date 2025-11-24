<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use App\Http\Requests\DisciplinaRequest;
use App\Models\TipoConteudo;
use Illuminate\Support\Facades\DB;
use App\Models\Conteudo;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nome = $request->query('nome');
        $descricao = $request->query('descricao');
        $status = strlen($request->query('status')) > 0 ? [$request->query('status')] : [0,1];

        $disciplinas = Disciplina::where('nome','LIKE','%'.$nome.'%')
                              ->where('descricao','LIKE','%'.$descricao.'%')
                              ->whereIn('status',$status)
                              ->paginate(6);

        return view('disciplina.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('disciplina.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DisciplinaRequest $request)
    {
        $disciplina = Disciplina::create([
            'nome' => $request['nome'],
            'descricao' => $request['descricao'],
            'status' => $request['status'],
            'observacao' => $request['observacao'],
            'dt_cadastro' => date('Y-m-d')
        ]);

        if($disciplina)
        {
            return redirect()->route('disciplina.index')
                             ->with('success','Disciplina cadastrada com sucesso!!');   
        }
        else
        {
            return redirect()->route('disciplina.index')
                             ->with('error','Não foi possível cadastrar a Disciplina!!');   
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Disciplina $disciplina)
    {
        return view('disciplina.view', ['modelDisciplina' => $disciplina]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disciplina $disciplina)
    {
        return view('disciplina.update', ['modelDisciplina' => $disciplina]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DisciplinaRequest $request, Disciplina $disciplina)
    {
        $disciplina = $disciplina->update([
            'nome' => $request['nome'],
            'descricao' => $request['descricao'],
            'status' => $request['status'],
            'observacao' => $request['observacao'],
        ]);

        if($disciplina)
        {
            return redirect()->route('disciplina.index')
                             ->with('success','Disciplina atualizada com sucesso!!');   
        }
        else
        {
            return redirect()->route('disciplina.index')
                             ->with('error','Não foi possível atualizar a Disciplina!!');   
        }
    }

     /**
     * Add content
     */
    public function conteudos(Disciplina $id)
    {
        $modelDisciplina = $id;
        $tipoConteudo = TipoConteudo::get();


        return view('disciplina.conteudos', compact('modelDisciplina','tipoConteudo'));
    }

     /**
     * Add content
     */
    public function addConteudos(Request $request)
    {

        $dadosTituloRequest = $request->titulo;
        $arrDadosConteudos = [];

        $idDisciplina  = $request->id_disciplina;

        foreach($dadosTituloRequest as $key => $tituloRequest)
        {
            $arrDadosConteudos[] = 
            [
                'id' => $request->id[$key],
                'tipo_conteudo' => $request->tipo_conteudo[$key],
                'titulo' => $request->titulo[$key],
                'descricao' => $request->descricao[$key],
                'status' => $request->status[$key],
                'observacao' => $request->observacao[$key],
                'foi_excluido' => isset($request->foi_excluido[$key]) 
                                  ? $request->foi_excluido[$key] : 0 
            ];
        }

        DB::beginTRansaction();

        try
        {

            foreach($arrDadosConteudos as $key2 => $dadosRequest)
            {

                if(strlen($dadosRequest['id']) > 0)
                {
                    $modelConteudo = Conteudo::find($dadosRequest['id']);

                    if($modelConteudo)
                    {
                        if($dadosRequest['foi_excluido'] == 0)
                        {
                            $modelConteudo->update([
                                'id_tipo' => $dadosRequest['tipo_conteudo'],
                                'titulo' => $dadosRequest['titulo'],
                                'status' => $dadosRequest['status'],
                                'descricao' => $dadosRequest['descricao'],
                                'observacao' => $dadosRequest['observacao'],
                                'id_disciplina' => $idDisciplina
                            ]);
                        }
                        else
                        {
                            $modelConteudo->delete();
                        }   
                    }
                }
                else
                {
                    if(strlen($dadosRequest['titulo']) > 0)
                    {
                        $salvou = Conteudo::create([
                            'id_tipo' => $dadosRequest['tipo_conteudo'],
                            'titulo' => $dadosRequest['titulo'],
                            'status' => $dadosRequest['status'],
                            'descricao' => $dadosRequest['descricao'],
                            'observacao' => $dadosRequest['observacao'],
                            'id_disciplina' => $idDisciplina
                        ]
                        );

                        if(!$salvou)
                        {
                            DB::rollBack();

                            return redirect()->route('disciplina.index')
                             ->with('error','Não foi possível atualizar os conteúdos!!'); 
                        }
                    }
                }
            }

            DB::commit();

            return redirect()->route('disciplina.index')
                             ->with('success','Conteúdos atualizados com sucesso!!'); 

        }catch(Exception $e)
        {
            DB::rollBack();

            return redirect()->route('disciplina.index')
                             ->with('error', $e->getMessage()); 
        }


        return view('disciplina.conteudos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disciplina $disciplina)
    {
        //
    }
}
