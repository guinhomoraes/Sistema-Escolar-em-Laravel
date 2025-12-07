<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Usuário </span> - Visualizar Usuário</h3>
                <a class="btn btn-primary" href="{{ route('usuario.index') }}">Listar Usuários</a>

            </div>

       

            <div class="col-8">

                <div class="row">


                    <div class="col-12 my-2">

                        <div class="form-group m-0">
                            <label for="">Nome</label>
                            <input id="name" class="form-control" type="text" name="name" 
                              value="{{ $modelUsuario->name }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">Rg</label>
                            <input id="rg" class="form-control" type="text" name="rg" 
                              value="{{ $modelUsuario->rg }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">CPF</label>
                            <input id="cpf" class="form-control" type="text" name="cpf" 
                              value="{{ $modelUsuario->cpf }}" disabled>
                        </div>
                    
                    </div>

                    
                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <input type="text" class="form-control" name="status" id="status" value="{{ $modelUsuario->status == 1 ? "Ativo" : "Inativo"}}" disabled>
                        </div>

                    </div>


                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">

                        <div class="form-group m-0">
                            <label for="">Telefone</label>
                            <input id="telefone" class="form-control" type="text" name="telefone" 
                              value="{{ $modelUsuario->telefone }}" disabled>
                        </div>
                    
                    </div>

     

                     <div class="col-12">

                        <div class="form-group m-0">
                            <label for="">E-mail</label>
                            <input id="email" class="form-control" type="email" name="email" 
                              value="{{ $modelUsuario->email }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Endereço</label>
                            <input id="endereco" class="form-control" type="text" name="endereco" 
                              value="{{ $modelUsuario->endereco }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 my-2">

                        <div class="form-group m-0">
                            <label for="">Complemento</label>
                            <input id="complemento" class="form-control" type="text" name="complemento" 
                              value="{{ $modelUsuario->complemento }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Bairro</label>
                            <input id="bairro" class="form-control" type="text" name="bairro" 
                              value="{{ $modelUsuario->bairro }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Cidade</label>
                            <input id="cidade" class="form-control" type="text" name="cidade" 
                              value="{{ $modelUsuario->cidade }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Estado</label>
                            <input id="estado" class="form-control" type="text" name="estado" 
                              value="{{ $modelUsuario->estado }}" disabled>
                        </div>
                    
                    </div>

   

                    <div class="col-12 my-2">

                        <div class="form-group m-0">
                            <label for="">Observação</label>
                            <textarea class="form-control" name="observacao" id="observacao" rows="2" disabled>{{ $modelUsuario->observacao }}</textarea>
                        </div>
                    
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-layout>