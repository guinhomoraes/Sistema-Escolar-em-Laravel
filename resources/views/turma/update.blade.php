<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Turma </span> - Editar Turma</h3>
                <a class="btn btn-primary" href="{{ route('turma.index') }}">Listar Turmas</a>

            </div>

            <div class="col-12">

                <div class="row"></div>
                    <div class="col-8 my-3">
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

            <div class="col-10">

                <form class="row" action="{{ route('turma.update',$modelTurma->id) }}" method="post">

                    @csrf
                    @method('put')

                      <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Professor</label>
                            <select class="form-control" name="id_professor" id="id_professor">
                                <option value="">-</option>
                                @foreach($professores as $professor)
                                    <option value="{{$professor->id}}" 
                                            @selected( $modelTurma->id_professor == $professor->id)>{{ $professor->registro}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Escola</label>
                            <select class="form-control" name="id_escola" id="id_escola">
                                <option value="">-</option>
                                @foreach($escolas as $escola)
                                    <option value="{{$escola->id}}" 
                                            @selected( $modelTurma->id_escola == $escola->id)>{{ $escola->razao_social}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">
                        <div class="form-group m-0">
                            <label for="">Código</label>
                            <input class="form-control" type="text" name="nome" id="" value="{{ $modelTurma->nome }}">
                        </div>
                    </div>

                    
                    <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 my-2">
                        <div class="form-group m-0">
                            <label for="">Descrição</label>
                            <input class="form-control" type="text" name="descricao" id="" value="{{ $modelTurma->descricao }}">
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">
                        <div class="form-group m-0">
                            <label for="">Início</label>
                            <input class="form-control" type="date" name="dt_inicio" id="" value="{{ $modelTurma->dt_inicio }}">
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">
                        <div class="form-group m-0">
                            <label for="">Término</label>
                            <input class="form-control" type="date" name="dt_termino" id="" value="{{ $modelTurma->dt_termino }}">
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">
                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="">
                                <option value="0" @selected( $modelTurma->status == 0)>Inativo</option>
                                <option value="1" @selected( $modelTurma->status == 1)>Ativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 my-2">

                        <div class="form-group m-0">
                            <label for="">Observação</label>
                            <textarea class="form-control" name="observacao" id="observacao" rows="2">{{ $modelTurma->observacao}}</textarea>
                        </div>
                    
                    </div>

                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2 d-flex align-items-end">

                        <button class="btn btn-primary mr-1">Salvar</button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-layout>