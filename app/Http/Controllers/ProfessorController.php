<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Models\Escola;
use App\Models\Professor;
use App\Models\Search\ProfessorSeach;
use App\Models\User;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $escolas = Escola::get();
        $usuarios = User::get();

        $modelSearchProfessor = new ProfessorSeach;
        $professores = $modelSearchProfessor->search($request);

        return view('professor.index', [
            'professores' => $professores,
            'escolas' => $escolas,
            'usuarios' => $usuarios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $escolas = Escola::get();
        $usuarios = User::get();

        return view('professor.create', [
            'escolas' => $escolas,
            'usuarios' => $usuarios,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfessorRequest $request)
    {
        $professor = Professor::create([
            'registro' => $request['registro'],
            'id_usuario' => $request['id_usuario'],
            'id_escola' => $request['id_escola'],
            'status' => $request['status'],
            'salario' => $request['salario'],
            'observacao' => $request['observacao'],
            'status' => $request['status'],
            'telefone' => $request['telefone'],
            'data_cadastro' => date('Y-m-d'),
        ]);

        if ($professor) {
            return redirect()->route('professor.index')
                ->with('success', 'Professor cadastrado com sucesso!!');
        } else {
            return redirect()->route('professor.index')
                ->with('error', 'Não foi possível cadastrar o Professor!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        $modelProfessor = $professor;

        return view('professor.view', [
            'modelProfessor' => $modelProfessor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professor $professor)
    {
        $modelProfessor = $professor;

        $escolas = Escola::get();
        $usuarios = User::get();

        return view('professor.update', [
            'modelProfessor' => $modelProfessor,
            'escolas' => $escolas,
            'usuarios' => $usuarios,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfessorRequest $request, Professor $professor)
    {
        $professor = $professor->update([
            'registro' => $request['registro'],
            'id_usuario' => $request['id_usuario'],
            'id_escola' => $request['id_escola'],
            'status' => $request['status'],
            'salario' => $request['salario'],
            'observacao' => $request['observacao'],
            'status' => $request['status'],
            'telefone' => $request['telefone'],
        ]);

        if ($professor) {
            return redirect()->route('professor.index')
                ->with('success', 'Professor atualizado com sucesso!!');
        } else {
            return redirect()->route('professor.index')
                ->with('error', 'Não foi possível atualizar o Professor!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor)
    {
        //
    }
}
