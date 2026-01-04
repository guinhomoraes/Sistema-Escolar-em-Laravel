<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Professor </span> - Cadastrar Professor</h3>
                <a class="btn btn-primary" href="{{ route('professor.index') }}">Listar Professores</a>

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

            <div class="col-8">

                <form class="row" action="{{ route('professor.store') }}" method="post">

                    @csrf

                    <div class="col-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">

                         <div class="form-group m-0">
                            <label for="">Registro</label>
                            <input class="form-control" type="text" name="registro" id="registro"
                            value="{{ old('registro') }}">
                        </div>

                    </div>

                    <div class="col-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5 my-2">

                        <div class="form-group m-0">
                            <label for="">Professor</label>
                            <select class="form-control" name="id_usuario" id="id_usuario">
                                <option value="">-</option>
                                @foreach($usuarios as $user)
                                    <option value="{{$user->id}}" 
                                            @selected( old("id_usuario") == $user->id)>{{ $user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5 my-2">

                        <div class="form-group m-0">
                            <label for="">Escola</label>
                            <select class="form-control" name="id_escola" id="id_escola">
                                <option value="">-</option>
                                @foreach($escolas as $escola)
                                    <option value="{{$escola->id}}" 
                                            @selected( old("id_escola") == $escola->id)>{{ $escola->razao_social}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 my-2">

                         <div class="form-group m-0">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="0">Inativo</option>
                                <option value="1">Ativo</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 my-2">

                         <div class="form-group m-0">
                            <label for="">Salario</label>
                            <input class="form-control" type="text" name="salario" id="salario"
                            value="{{ old('salario') }}">
                        </div>

                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 my-2">

                         <div class="form-group m-0">
                            <label for="">Telefone</label>
                            <input class="form-control" type="text" name="telefone" id="telefone"
                            value="{{ old('telefone') }}">
                        </div>

                    </div>
                    
                    <div class="col-12">

                         <div class="form-group my-2">
                            <label for="">Observação</label>
                            <textarea class="form-control" name="observacao" id="observacao" rows="3">{{ old('observacao') }}</textarea>
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