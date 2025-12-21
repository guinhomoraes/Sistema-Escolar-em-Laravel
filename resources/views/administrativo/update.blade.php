<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Administrativo </span> - Editar Administrativo</h3>
                <a class="btn btn-primary" href="{{ route('administrativo.index') }}">Listar Administrativo</a>

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

                <form class="row" action="{{ route('administrativo.update',$modelAdministrativo->id) }}" method="post">

                    @csrf
                    @method('put')

                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">

                        <div class="form-group m-0">
                            <label for="">Usuário</label>
                            <select class="form-control" name="id_usuario" id="id_usuario">
                                <option value="">-</option>
                                @foreach($usuarios as $user)
                                    <option value="{{$user->id}}" 
                                            @selected( $modelAdministrativo->id_usuario == $user->id)>{{ $user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">

                        <div class="form-group m-0">
                            <label for="">Escola</label>
                            <select class="form-control" name="id_escola" id="id_escola">
                                <option value="">-</option>
                                @foreach($escolas as $escola)
                                    <option value="{{$escola->id}}" 
                                            @selected( $modelAdministrativo->id_escola == $escola->id)>{{ $escola->razao_social}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>

                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2">

                        <div class="form-group m-0">
                            <label for="">Cargo</label>
                            <select class="form-control" name="id_cargo" id="id_cargo">
                                <option value="">-</option>
                                @foreach($cargos as $cargo)
                                    <option value="{{$cargo->id}}" 
                                            @selected( $modelAdministrativo->id_cargo == $cargo->id)>{{ $cargo->titulo}}</option>
                                @endforeach
                            </select>
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