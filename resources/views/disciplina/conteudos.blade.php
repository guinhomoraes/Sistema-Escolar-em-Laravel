<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Disciplina </span> - Gestão de Conteúdo</h3>
                <a class="btn btn-primary" href="{{ route('disciplina.index') }}">Listar Disciplinas</a>

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

                <form class="row" action="{{ route('disciplina.add-conteudos') }}" method="post">

                    @csrf

                    <input type="hidden" name="id_disciplina" value="{{ $modelDisciplina->id }}">

                    <div class="col-12">


                        <div class="row conteudos-adicionados">

                            <div class="col-12">
                                <h4>Conteúdos Adicionados</h4>
                            </div>

                            @foreach ($modelDisciplina->conteudos as $conteudo)

                                <div class="col-12 card my-2">
                                    
                                    <div class="card-body row">

                                        <div class="col-12 d-flex justify-content-end">
                                            <button class="btn btn-danger btn-desfazer-remocao d-none">Desfazer Remoção</button>
                                            <button class="btn btn-danger btn-remove-conteudo">Remover</button>
                                        </div>

                                        <div class="col-7 form-group">
                                            <label for="">Titulo <span class="text-danger"> * </span></label>
                                            <input id="titulo" class="form-control" name="titulo[]" type="text" 
                                            value="{{ $conteudo->titulo }}" required>
                                        </div>
                                        <div class="col-5 form-group">
                                            <label for="">Tipo de Conteúdo <span class="text-danger"> * </span></label>
                                            <select id="tipo_conteudo" class="form-control" name="tipo_conteudo[]" id="" required>

                                                @foreach ($tipoConteudo as $tipo)
                                                    <option value="{{ $tipo->id }}" @selected($tipo->id == $conteudo->id_tipo) >{{ $tipo->tipo }}</option> 
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-2 form-group">
                                            <label for="">Status <span class="text-danger"> * </span></label>
                                            <select id="status" class="form-control" name="status[]" id="">
                                                <option value="0" @selected($conteudo->status == 0) >Inativo</option>
                                                <option value="1" @selected($conteudo->status == 1) >Ativo</option>
                                            </select>
                                        </div>
                                        <div class="col-10 form-group">
                                            <label for="">Descrição <span class="text-danger"> * </span></label>
                                            <input id="descricao" class="form-control" name="descricao[]" type="text"
                                            value="{{ $conteudo->descricao }}" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="">Observação</label>
                                            <textarea id="observacao" class="form-control" name="observacao[]" id="" rows="2">{{ $conteudo->observacao }}</textarea>
                                        </div>
                                        <div class="campo-id">
                                            <input type="hidden" name="id[]" value="{{ $conteudo->id }}">
                                            <input type="hidden" name="foi_excluido[]" value="0">
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                        <div class="row conteudos-novos my-3">


                            <div class="col-12">

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between align-items-end">
                                        <h4>Novos Conteúdos</h4>
                                        <button class="btn btn-primary" id="btn-add-conteudo">Adicionar Conteúdo</button>
                                    </div>
                                </div>
                                

                                <div class="row d-none conteudo-modelo">
                                    
                                    <div class="col-12 card my-2">

                                        <div class="card-body row">

                                            <div class="col-12 d-flex justify-content-end">
                                                <button class="btn btn-danger btn-remove-conteudo">Remover</button>
                                            </div>
                                            
                                            <div class="col-7 form-group">
                                                <label for="">Titulo <span class="text-danger"> * </span></label>
                                                <input name="titulo[]" class="form-control" type="text">
                                            </div>
                                            <div class="col-5 form-group">
                                                <label for="">Tipo de Conteúdo <span class="text-danger"> * </span></label>
                                                <select id="tipo_conteudo" class="form-control" name="tipo_conteudo[]" id="" required>

                                                    @foreach ($tipoConteudo as $tipo)
                                                        <option value="{{ $tipo->id }}" >{{ $tipo->tipo }}</option> 
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-2 form-group">
                                                <label for="">Status <span class="text-danger"> * </span></label>
                                                <select class="form-control" name="status[]" id="">
                                                    <option value="">Ativo</option>
                                                    <option value="">Inativo</option>
                                                </select>
                                            </div>
                                            <div class="col-10 form-group">
                                                <label for="">Descrição <span class="text-danger"> * </span></label>
                                                <input class="form-control" name="descricao[]" type="text">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="">Observação</label>
                                                <textarea class="form-control" name="observacao[]" id="" rows="2"></textarea>
                                            </div>
                                            <div class="campo-id">
                                                <input type="hidden" name="id[]">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="row campos-novos">

                                    </div>

                                </div>

                            </div>

                        </div>




                    </div>

                    <div class="col-12 d-flex justify-content-center my-3">
                        <button class="btn btn-primary">Atualizar Conteúdo</button>
                    </div>


                </form>

            </div>

        </div>
    </div>

</x-layout>