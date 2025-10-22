<?php

namespace App\Http\Controllers;

use App\Models\TipoConteudo;
use Illuminate\Http\Request;
use App\Http\Requests\TipoConteudoRequest;

class TipoConteudoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tipo = $request->query('tipo');
        $status = strlen($request->query('status')) > 0 ? [$request->query('status')] : [0,1];

        $tipos = TipoConteudo::where('tipo','LIKE','%'.$tipo.'%')
                              ->whereIn('status',$status)
                              ->paginate(6);

        return view('tipo-conteudo.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo-conteudo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoConteudoRequest $request)
    {
        $tipo_conteudo = TipoConteudo::create([
            'tipo' => $request['tipo'],
            'status' => $request['status']
        ]);

        if($tipo_conteudo)
        {
            return redirect()->route('tipo-conteudo.index')
                             ->with('success','Tipo de Conteúdo cadastrado com sucesso!!');   
        }
        else
        {
            return redirect()->route('tipo-conteudo.index')
                             ->with('error','Não foi possível cadastrar o Tipo de Conteúdo!!');   
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoConteudo $tipoConteudo)
    {
        return view('tipo-conteudo.view', [
          'modelTipoConteudo' => $tipoConteudo 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoConteudo $tipo_conteudo)
    {
        return view('tipo-conteudo.update', [
          'modelTipoConteudo' => $tipo_conteudo 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoConteudoRequest $request, TipoConteudo $tipoConteudo)
    {
         $tipo_conteudo = $tipoConteudo->update([
            'tipo' => $request['tipo'],
            'status' => $request['status']
        ]);

        if($tipo_conteudo)
        {
            return redirect()->route('tipo-conteudo.index')
                             ->with('success','Tipo de Conteúdo atualizado com sucesso!!');   
        }
        else
        {
            return redirect()->route('tipo-conteudo.index')
                             ->with('error','Não foi possível atualizar o Tipo de Conteúdo!!');   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoConteudo $tipoConteudo)
    {
        //
    }
}
