<?php
use App\Models\Curso;
?>
<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Turma </span> - Visualizar Turma</h3>
                <a class="btn btn-primary" href="{{ route('turma.index') }}">Listar Turmas</a>

            </div>


            <div class="col-8">

                <div class="row">

                      <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Professor</label>
                            <input class="form-control" type="text" name="id_professor" id="" value="{{ $modelTurma->professor->registro}}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Escola</label>
                            <input class="form-control" type="text" name="id_escola" id="" value="{{ $modelTurma->escola->razao_social}}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">
                        <div class="form-group m-0">
                            <label for="">Código</label>
                            <input class="form-control" type="text" name="nome" id="" value="{{ $modelTurma->nome }}" disabled>
                        </div>
                    </div>

                    
                    <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 my-2">
                        <div class="form-group m-0">
                            <label for="">Descrição</label>
                            <input class="form-control" type="text" name="descricao" id="" value="{{ $modelTurma->descricao }}" disabled>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">
                        <div class="form-group m-0">
                            <label for="">Início</label>
                            <input class="form-control" type="date" name="dt_inicio" id="" value="{{ $modelTurma->dt_inicio }}" disabled>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">
                        <div class="form-group m-0">
                            <label for="">Término</label>
                            <input class="form-control" type="date" name="dt_termino" id="" value="{{ $modelTurma->dt_termino }}" disabled>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">
                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <input class="form-control" type="text" name="status" id="" value="{{ $modelTurma->status == 1 ? "Ativo" : "Inativo" }}" disabled>
                        </div>
                    </div>

                    <div class="col-12 my-2">

                        <div class="form-group m-0">
                            <label for="">Observação</label>
                            <textarea class="form-control" name="observacao" id="observacao" rows="2" disabled>{{ $modelTurma->observacao}}</textarea>
                        </div>
                    
                    </div>


                </div>

                <div class="row my-3">

                     <div class="col-12">


                        <div class="row">

                            <div class="col-12">
                                <h4>Cursos Vinculados / Alunos</h4>
                            </div>

                            <div class="col-12 my-2">

                                @foreach ($cursosJaVinculados as $curso)

                                    <div class="card my-2">

                                        <div class="card-body">

                                            <h5 class="my-2"><b>{{ $curso->nome}} - {{ $curso->descricao}}</b></h5>

                                            <?php $alunos = Curso::getAlunosByCurso($curso->id,$modelTurma->id); ?>
                                                
                                            <div class="table-responsive my-2">

                                                <table class="table table-striped table-hover">

                                                    <thead>

                                                        <tr>
                                                            <th>Aluno</th>
                                                            <th>Nota</th>                                                    
                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        @foreach ($alunos as $aluno)

                                                            <tr>
                                                                <td>{{ $aluno->name}}</td>
                                                                <td>
                                                                    @if (Curso::podeEditarCurso($modelTurma->id))
                                                                    
                                                                        <form class="form-inline" action="{{ route('turma.atualiza-nota', ['id' => $aluno->id]) }}" method="post">

                                                                            @csrf
                                                                            @method('put')

                                                                            <input type="number" class="form-control" name="nota" value="{{ $aluno->nota }}">
                                                                            <button class="btn btn-primary ml-2">Atualizar</button>
                                                                        
                                                                        </form>

                                                                    @else
                                                                        {{strlen($aluno->nota) > 0 ? $aluno->nota : "Não Atribuído"}}
                                                                    @endif
                                                                </td>
                                                            </tr>

                                                        @endforeach

                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>
                        
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-layout>