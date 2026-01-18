<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Turma </span> - Gestão de Cursos</h3>
                <a class="btn btn-primary" href="{{ route('turma.index') }}">Listar Turmas</a>

            </div>

            <div class="col-12">

                <div class="row"></div>
                    <div class="col-5 my-3">
                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Atenção!</strong> 
                                <br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                <div>

            </div>

            <div class="col-12">

                <form class="row" action="{{ route('turma.add-cursos') }}" method="post">

                    @csrf

                    <input type="hidden" name="id_turma" value="{{ $modelTurma->id }}">

                    <div class="col-12">


                        <div class="row">

                            <div class="col-12">
                                <h4>Cursos Ativos</h4>
                            </div>

                            <div class="col-12 my-2">
                                    
                                    <div class="table-responsive">

                                        <table class="table table-striped table-hover">

                                            <thead>

                                                <tr>
                                                    <th>Selecionar</th>
                                                    <th>Nome</th>
                                                    <th>Descrição</th>
                                                </tr>

                                            </thead>

                                            <tbody>

                                                @foreach ($cursos as $curso)

                                                    <tr>
                                                        <td><input type="checkbox" name="Cursos[]" id="" value={{$curso->id}}
                                                            @checked(in_array($curso->id, $arrCursoAdicionados))></td>
                                                        <td>{{ $curso->nome}}</td>
                                                        <td>{{ $curso->descricao}}</td>
                                                    </tr>

                                                @endforeach

                                            </tbody>

                                        </table>

                                    </div>

                            </div>
                        
                        </div>

                    </div>

                    <div class="col-12 d-flex justify-content-center my-3">
                        <button class="btn btn-primary">Atualizar Cursos</button>
                    </div>


                </form>

            </div>

        </div>
    </div>

</x-layout>