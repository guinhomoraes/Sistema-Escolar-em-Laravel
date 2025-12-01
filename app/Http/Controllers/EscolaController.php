<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Illuminate\Http\Request;
use App\Http\Requests\EscolaRequest;

class EscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $codigo_escola = !empty($request->query("codigo_escola")) ? $request->query('codigo_escola') : '';
        $nome_fantasia = !empty($request->query("nome_fantasia")) ? $request->query('nome_fantasia') : '';
        $razao_social = !empty($request->query("razao_social")) ? $request->query('razao_social') : '';
        $status = strlen($request->query("status")) > 0 ? [$request->query("status")] : [0,1];

        $escolas = Escola::where('codigo_escola','LIKE','%'.$codigo_escola.'%')
                         ->where('nome_fantasia','LIKE','%'.$nome_fantasia.'%')
                         ->where('razao_social','LIKE','%'.$razao_social.'%')
                         ->whereIn('status', $status)
                         ->paginate(5);


        return view('escola.index',[
            'escolas' => $escolas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('escola.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EscolaRequest $request)
    {

        $escola = Escola::create($request->all());


        if($escola)
        {
            return redirect()->route('escola.index')
                             ->with('success','Escola cadastrada com sucesso!!');   
        }
        else
        {
            return redirect()->route('escola.index')
                             ->with('error','Não foi possível cadastrar a Escola!!');   
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Escola $escola)
    {
        $modelEscola = $escola;
        return view('escola.view',compact('modelEscola'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Escola $escola)
    {
        $modelEscola = $escola;
        return view('escola.update',compact('modelEscola'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EscolaRequest $request, Escola $escola)
    {
        $escola = $escola->update($request->all());

        if($escola)
        {
            return redirect()->route('escola.index')
                             ->with('success','Escola atualizada com sucesso!!');   
        }
        else
        {
            return redirect()->route('escola.index')
                             ->with('error','Não foi possível atualizar a Escola!!');   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Escola $escola)
    {
        //
    }
}
