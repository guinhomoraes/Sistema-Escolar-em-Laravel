<x-layout>

    <div class="container-fluid">
        <di class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Administrativo </span> - Listar Administrativo</h3>
                <a class="btn btn-primary" href="{{ route('administrativo.create') }}">Cadastrar Administrativo</a>

            </div>

            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            @if (session('error'))
                <div class="alert alert-danger mt-2" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="col-12 my-3">

                <form class="row" action="{{ route('administrativo.index') }}" method="get">

                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">

                        <div class="form-group m-0">
                            <label for="">Usuário</label>
                            <select class="form-control" name="id_usuario" id="id_usuario">
                                <option>-</option>
                                @foreach($usuarios as $user)
                                    <option value="{{$user->id}}" 
                                            @selected( strlen(request()->query("id_usuario")) == $user->id)>{{ $user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">

                        <div class="form-group m-0">
                            <label for="">Escola</label>
                            <select class="form-control" name="id_escola" id="id_escola">
                                <option>-</option>
                                @foreach($escolas as $escola)
                                    <option value="{{$escola->id}}" 
                                            @selected( strlen(request()->query("id_escola")) == $escola->id)>{{ $escola->razao_social}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    </div>

                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2">

                        <div class="form-group m-0">
                            <label for="">Cargo</label>
                            <select class="form-control" name="id_cargo" id="id_cargo">
                                <option>-</option>
                                @foreach($cargos as $cargo)
                                    <option value="{{$cargo->id}}" 
                                            @selected( strlen(request()->query("id_cargo")) == $cargo->id)>{{ $cargo->titulo}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2 d-flex align-items-end">

                        <button class="btn btn-primary mr-1">Pesquisar</button>
                        <a href="{{ route('administrativo.index') }}" class="btn btn-danger">Limpar</a>

                    </div>

                </form>

            </div>

            <div class="col-12 my-3">
                <div class="table-responsive">

                    <table class="table table-striped table-hover">

                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Escola</th>
                                <th>Cargo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                                @foreach ($administrativos as $key => $administrativo)
                                    <tr>
                                        <td>{{ $administrativo->usuario->name }}</td>
                                        <td>{{ $administrativo->escola->razao_social }}</td>
                                        <td>{{ $administrativo->cargo->titulo}}</td>
                                        <td>
                                            <a href="{{ route('administrativo.show',$administrativo->id)}}"><x-bx-detail width="30"/></a>
                                            <a href="{{ route('administrativo.edit', $administrativo->id)}}"><x-eva-edit-outline width="30" /></a>
                                        </td>
                                    </tr>

                                @endforeach
                        </tbody>

                    </table>

                </div>

                <div>
                    {{ $administrativos->links() }}
                </div>

            </div>

        </di>
    </div>

</x-layout>