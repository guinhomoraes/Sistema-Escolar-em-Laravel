<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Usuário </span> - Visualizar Cursos</h3>
                <a class="btn btn-primary" href="{{ route('usuario.index') }}">Listar Usuários</a>

            </div>

            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="col-12">
                
                @if (session('error'))
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

            </div>


            <div class="col-10 my-2">

                @foreach($arrayCursoAluno as $curso)

                        <div class="card my-3">

                            <div class="card-header bg-white d-flex justify-content-between align-items-center">

                                <h5><b>Curso</b> : {{ $curso['curso']->nome }} </h5>

                                <div>

                                    <button type="button" class="btn btn-primary">
                                        Nota <span class="badge bg-success"> {{ $curso['curso']->nota }}</span>
                                    </button>

                                    <button type="button" class="btn btn-primary">
                                        Progresso <span class="badge bg-secondary"> {{ $curso['curso']->progresso }}</span>
                                    </button>

                                </div>

                            </div>

                            <div class="card-body">

                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Status</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(@isset($curso['disciplinas']))
                                            
                                            @foreach($curso['disciplinas'] as $keyD => $disciplina)
                                                <tr>
                                                    <td>{{$disciplina->nome}}</td>
                                                    <td>{{$disciplina->descricao}}</td>
                                                    <td>{{$disciplina->status == 1 ? "Finalizada" : "Em Progresso" }}</td>
                                                    <td>
                                                        @if($disciplina->status == 0)
                                                            <a href="{{ route('concluir-disciplina',
                                                            ['id_aluno' => $curso['curso']->id_aluno,
                                                            'id_curso' => $curso['curso']->id,
                                                            'id_disciplina' => $disciplina->id ]) }}" class="btn btn-success">Concluir</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @endif
                                    </tbody>
                                </table>

                            </div>

                        </div>

                @endforeach

            </div>

        </div>
    </div>

</x-layout>