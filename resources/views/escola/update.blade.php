<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Escola </span> - Editar Escola</h3>
                <a class="btn btn-primary" href="{{ route('escola.index') }}">Listar Escolas</a>

            </div>

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

            <div class="col-9">

                <form class="row" action="{{ route('escola.update',$modelEscola->id) }}" method="post">

                    @csrf
                    @method('put')

                    <div class="col-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2 my-2">

                        <div class="form-group m-0">
                            <label for="">Código</label>
                            <input id="codigo_escola" class="form-control" type="text" name="codigo_escola" 
                              value="{{ $modelEscola->codigo_escola }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">CNPJ</label>
                            <input id="cnpj" class="form-control" type="text" name="cnpj" 
                              value="{{ $modelEscola->cnpj }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">Data de Inauguração</label>
                            <input id="data_inauguracao" class="form-control" type="date" name="data_inauguracao" 
                              value="{{ $modelEscola->data_inauguracao }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @selected( $modelEscola->status == 1)>Ativo</option>
                                <option value="0" @selected( $modelEscola->status == 0)>Inativo</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Nome Fantasia</label>
                            <input id="nome_fantasia" class="form-control" type="text" name="nome_fantasia" 
                              value="{{ $modelEscola->nome_fantasia }}">
                        </div>
                    
                    </div>

                     <div class="col-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5 my-2">

                        <div class="form-group m-0">
                            <label for="">Razão Social</label>
                            <input id="razao_social" class="form-control" type="text" name="razao_social" 
                              value="{{ $modelEscola->razao_social }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">Telefone</label>
                            <input id="telefone" class="form-control" type="text" name="telefone" 
                              value="{{ $modelEscola->telefone }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Endereço</label>
                            <input id="endereco" class="form-control" type="text" name="endereco" 
                              value="{{ $modelEscola->endereco }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Complemento</label>
                            <input id="complemento" class="form-control" type="text" name="complemento" 
                              value="{{ $modelEscola->complemento }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Bairro</label>
                            <input id="bairro" class="form-control" type="text" name="bairro" 
                              value="{{ $modelEscola->bairro }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Cidade</label>
                            <input id="cidade" class="form-control" type="text" name="cidade" 
                              value="{{ $modelEscola->cidade }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Estado</label>
                            <input id="estado" class="form-control" type="text" name="estado" 
                              value="{{ $modelEscola->estado }}">
                        </div>
                    
                    </div>

                    <div class="col-12 my-2">

                        <div class="form-group m-0">
                            <label for="">Observação</label>
                            <textarea class="form-control" name="observacao" id="observacao" rows="4">{{ $modelEscola->observacao}}</textarea>
                        </div>
                    
                    </div>
           

                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2 d-flex align-items-end my-3">

                        <button class="btn btn-primary mr-1">Salvar</button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-layout>