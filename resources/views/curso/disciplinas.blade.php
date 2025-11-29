<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Curso </span> - Gestão de Disciplinas</h3>
                <a class="btn btn-primary" href="{{ route('curso.index') }}">Listar Cursos</a>

            </div>

            <div class="row"></div>
                <div class="col-12 my-3">
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

            <div class="col-12">

                <form class="row" action="{{ route('curso.add-disciplinas') }}" method="post">

                    @csrf

                    <input type="hidden" name="id_curso" value="{{ $modelCurso->id }}">

                    <div class="col-12 table-responsive">

                        <table class="table table-striped table-hover" id="datatables">

                            <thead>
                                <tr>
                                    <th>Ação</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($disciplinas as $disciplina )
                                
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="disciplina[]" 
                                                                id="" value="{{ $disciplina->id }}" 
                                                                {{ in_array($disciplina->id, $arrayDisciplinas) ? 
                                                                'checked' : '' }} >
                                        </td>
                                        <td>{{ $disciplina->nome }}</td>
                                        <td>{{ $disciplina->descricao }}</td>
                                        <td>{{ $disciplina->status == 1 ? "Ativo" : "Inativo" }}</td>
                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2 d-flex align-items-end my-3">

                        <button class="btn btn-primary mr-1">Salvar</button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-layout>