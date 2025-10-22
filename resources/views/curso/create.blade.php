<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Curso </span> - Cadastrar Curso</h3>
                <a class="btn btn-primary" href="{{ route('curso.index') }}">Listar Cursos</a>

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

            <div class="col-5">

                <form class="row" action="{{ route('curso.store') }}" method="post">

                    @csrf

                    <div class="col-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-2">

                        <div class="form-group m-0">
                            <label for="">Nome</label>
                            <input id="nome" class="form-control" type="text" name="nome" 
                              value="{{ old("nome") }}">
                        </div>
                    
                    </div>

                    
                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @selected( old("status") == 1)>Ativo</option>
                                <option value="0" @selected( old("status") == 0)>Inativo</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-2">

                        <div class="form-group m-0">
                            <label for="">Descrição</label>
                            <input id="descricao" class="form-control" type="text" name="descricao" 
                            value="{{ old("descricao") }}">
                        </div>

                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Valor</label>
                            <input id="preco" class="form-control" type="text" name="preco" 
                            value="{{ old("preco") }}">
                        </div>

                    </div>

                    <div class="col-12 my-2">

                        <label for="">Observação</label>

                        <textarea name="observacao" id="observacao" class="form-control" cols="30" rows="5">{{ old("observacao") }}</textarea>

                    </div>


                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2 d-flex align-items-end my-3">

                        <button class="btn btn-primary mr-1">Salvar</button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-layout>