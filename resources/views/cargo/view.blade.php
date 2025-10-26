<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Cargo </span> - Visualizar Cargo</h3>
                <a class="btn btn-primary" href="{{ route('cargo.index') }}">Listar Cargo</a>

            </div>

            <div class="col-5">

                <div class="row">

                    @csrf
                    @method('put')

                     <div class="col-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-2">

                        <div class="form-group m-0">
                            <label for="">Titulo</label>
                            <input id="titulo" class="form-control" type="text" name="titulo" 
                              value="{{ $modelCargo->titulo }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <input type="text" class="form-control" 
                                   value="{{ $modelCargo->status == 1 ? "Ativo" : "Inativo" }}"
                                   disabled>
                        </div>

                    </div>

                    <div class="col-12 my-2">

                        <div class="form-group m-0">
                            <label for="">Descrição</label>
                            <input id="descricao" class="form-control" type="text" name="descricao" 
                              value="{{ $modelCargo->descricao }}" disabled>
                        </div>
                    
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-layout>