<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Escola;
use App\Models\User;
use App\Http\Requests\AdministrativoRequest;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id_usuario = !empty($request->query("id_usuario")) ? $request->query('id_usuario') : null;
        $id_escola = !empty($request->query("id_escola")) ? $request->query('id_escola') : null;
        $id_cargo = !empty($request->query("id_cargo")) ? $request->query('id_cargo') : null;

        $cargos = Cargo::get();
        $escolas = Escola::get();
        $usuarios = User::get();

        $administrativos = Administrativo::query()
                        ->when(!empty($id_usuario), function($query, $id_usuario){
                            return $query->where('id_usuario',$id_usuario);
                        })
                        ->when(!empty($id_escola), function($query, $id_escola){
                            return $query->where('id_escola',$id_escola);
                        })
                        ->when(!empty($id_cargo), function($query, $id_cargo){
                            return $query->where('id_cargo',$id_cargo);
                        })
                        ->paginate(6);


        return view('administrativo.index',[
            'administrativos' => $administrativos,
            'cargos' => $cargos,
            'escolas' => $escolas,
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargo::get();
        $escolas = Escola::get();
        $usuarios = User::get();

        return view('administrativo.create',[
            'cargos' => $cargos,
            'escolas' => $escolas,
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdministrativoRequest $request)
    {
        $administrativo = Administrativo::create([
            'id_usuario' => $request['id_usuario'],
            'id_escola' => $request['id_escola'],
            'id_cargo' => $request['id_cargo']
        ]);

        if($administrativo)
        {
            return redirect()->route('administrativo.index')
                             ->with('success','Administrativo cadastrado com sucesso!!');   
        }
        else
        {
            return redirect()->route('administrativo.index')
                             ->with('error','Não foi possível cadastrar o Administrativo!!');   
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrativo $administrativo)
    {
        $modelAdministrativo = $administrativo;

        return view('administrativo.view',[
            'modelAdministrativo' => $modelAdministrativo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrativo $administrativo)
    {
        $modelAdministrativo = $administrativo;

        $cargos = Cargo::get();
        $escolas = Escola::get();
        $usuarios = User::get();

        return view('administrativo.update',[
            'modelAdministrativo' => $modelAdministrativo,
            'cargos' => $cargos,
            'escolas' => $escolas,
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdministrativoRequest $request, Administrativo $administrativo)
    {
        $administrativo = $administrativo->update([
            'id_usuario' => $request['id_usuario'],
            'id_escola' => $request['id_escola'],
            'id_cargo' => $request['id_cargo']
        ]);

        if($administrativo)
        {
            return redirect()->route('administrativo.index')
                             ->with('success','Administrativo atualizado com sucesso!!');   
        }
        else
        {
            return redirect()->route('administrativo.index')
                             ->with('error','Não foi possível atualizar o Administrativo!!');   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrativo $administrativo)
    {
        //
    }
}
