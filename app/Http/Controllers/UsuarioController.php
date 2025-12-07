<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSearch;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cpf = !empty($request->query("cpf")) ? $request->query('cpf') : '';
        $rg = !empty($request->query("rg")) ? $request->query('rg') : '';
        $nome = !empty($request->query("nome")) ? $request->query('nome') : '';
        $status = strlen($request->query("status")) > 0 ? [$request->query("status")] : [0,1];

        $usuarios = User::where('cpf','LIKE','%'.$cpf.'%')
                         ->where('rg','LIKE','%'.$rg.'%')
                         ->where('name','LIKE','%'.$nome.'%')
                         ->whereIn('status', $status)
                         ->paginate(5);


        return view('usuario.index',[
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        $request->password = Hash::make($request->password);

        $user = User::create($request->all());


        if($user)
        {
            return redirect()->route('usuario.index')
                             ->with('success','Usuário cadastrado com sucesso!!');   
        }
        else
        {
            return redirect()->route('usuario.index')
                             ->with('error','Não foi possível cadastrar o Usuário!!');   
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserSearch $usuario)
    {
        $modelUsuario = $usuario;

        return view('usuario.view', compact('modelUsuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserSearch $usuario)
    {
        $modelUsuario = $usuario;

        return view('usuario.update', compact('modelUsuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $usuario)
    {

        if(strlen($request->password) > 0)
        {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
        }
        else
        {
            $request->merge([
                'password' => $usuario['password']
            ]);
        } 

        $user = $usuario->update($request->all());

        if($user)
        {
            return redirect()->route('usuario.index')
                             ->with('success','Usuário atualizado com sucesso!!');   
        }
        else
        {
            return redirect()->route('usuario.index')
                             ->with('error','Não foi possível atualizar o Usuário!!');   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
