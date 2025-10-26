<x-layout>

    <div class="container-fluid">
        <di class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Cargo </span> - Listar Cargo</h3>
                <a class="btn btn-primary" href="{{ route('cargo.create') }}">Cadastrar Cargo</a>

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

                <form class="row" action="{{ route('cargo.index') }}" method="get">

                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">

                        <div class="form-group m-0">
                            <label for="">Titulo</label>
                            <input class="form-control" type="text" name="titulo" 
                              value="{{ request()->query("titulo") }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">

                        <div class="form-group m-0">
                            <label for="">Descrição</label>
                            <input class="form-control" type="text" name="descricao" 
                              value="{{ request()->query("descricao") }}">
                        </div>
                    
                    </div>

                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2">

                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="">
                                <option value="" @selected( strlen(request()->query("status")) == 0)>-</option>
                                <option value="1" @selected( request()->query("status") == 1)>Ativo</option>
                                <option value="0" @selected( request()->query("status") == 0 
                                                             && strlen(request()->query("status")) > 0)>Inativo</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2 d-flex align-items-end">

                        <button class="btn btn-primary mr-1">Pesquisar</button>
                        <a href="{{ route('cargo.index') }}" class="btn btn-danger">Limpar</a>

                    </div>

                </form>

            </div>

            <div class="col-12 my-3">
                <div class="table-responsive">

                    <table class="table table-striped table-hover">

                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                                @foreach ($cargos as $key => $cargo)
                                    <tr>
                                        <td>{{ $cargo->titulo }}</td>
                                        <td>{{ $cargo->descricao }}</td>
                                        <td>{{ $cargo->status == 1  ? "Ativo" : "Inativo" }}</td>
                                        <td>
                                            <a href="{{ route('cargo.show',$cargo->id)}}"><x-bx-detail width="30"/></a>
                                            <a href="{{ route('cargo.edit', $cargo->id)}}"><x-eva-edit-outline width="30" /></a>
                                        </td>
                                    </tr>

                                @endforeach
                        </tbody>

                    </table>

                </div>

                <div>
                    {{ $cargos->links() }}
                </div>

            </div>

        </di>
    </div>

</x-layout>