<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Usuário </span> - Cadastrar Usuário</h3>
                <a class="btn btn-primary" href="{{ route('usuario.index') }}">Listar Usuários</a>

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

            <div class="col-8">

                <form class="row" action="{{ route('usuario.store') }}" method="post">

                    @csrf

                    <div class="col-12 my-2">

                        <div class="form-group m-0">
                            <label for="">Nome</label>
                            <input id="name" class="form-control" type="text" name="name" 
                              value="{{ old("name") }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">Rg</label>
                            <input id="rg" class="form-control" type="text" name="rg" 
                              value="{{ old("rg") }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">CPF</label>
                            <input id="cpf" class="form-control" type="text" name="cpf" 
                              value="{{ old("cpf") }}">
                        </div>
                    
                    </div>

                    
                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @selected( old("status") == 1)>Ativo</option>
                                <option value="0" @selected( old("status") == 0)>Inativo</option>
                            </select>
                        </div>

                    </div>


                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">Telefone</label>
                            <input id="telefone" class="form-control" type="text" name="telefone" 
                              value="{{ old("telefone") }}">
                        </div>
                    
                    </div>

     

                     <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">E-mail</label>
                            <input id="email" class="form-control" type="email" name="email" 
                              value="{{ old("email") }}">
                        </div>
                    
                    </div>


                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Senha</label>
                            <input id="password" class="form-control" type="password" name="password" 
                              value="{{ old("password") }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Endereço</label>
                            <input id="endereco" class="form-control" type="text" name="endereco" 
                              value="{{ old("endereco") }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Complemento</label>
                            <input id="complemento" class="form-control" type="text" name="complemento" 
                              value="{{ old("complemento") }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Bairro</label>
                            <input id="bairro" class="form-control" type="text" name="bairro" 
                              value="{{ old("bairro") }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Cidade</label>
                            <input id="cidade" class="form-control" type="text" name="cidade" 
                              value="{{ old("cidade") }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Estado</label>
                            <input id="estado" class="form-control" type="text" name="estado" 
                              value="{{ old("estado") }}">
                        </div>
                    
                    </div>

   

                    <div class="col-12 my-2">

                        <div class="form-group m-0">
                            <label for="">Observação</label>
                            <textarea class="form-control" name="observacao" id="observacao" rows="2">{{ old('observacao')}}</textarea>
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