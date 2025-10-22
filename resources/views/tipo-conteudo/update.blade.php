<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Tipo de Conteúdo </span> - Editar Tipo de Conteúdo</h3>
                <a class="btn btn-primary" href="{{ route('tipo-conteudo.index') }}">Listar Tipo de Conteúdo</a>

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

            <div class="col-5">

                <form class="row" action="{{ route('tipo-conteudo.update',$modelTipoConteudo->id) }}" method="post">

                    @csrf
                    @method('put')

                    <div class="col-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-2">

                        <div class="form-group m-0">
                            <label for="">Tipo</label>
                            <input id="tipo" class="form-control" type="text" name="tipo" 
                              value="{{ $modelTipoConteudo->tipo }}">
                        </div>
                    
                    </div>

                    
                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @selected( $modelTipoConteudo->status == 1)>Ativo</option>
                                <option value="0" @selected( $modelTipoConteudo->status == 0)>Inativo</option>
                            </select>
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