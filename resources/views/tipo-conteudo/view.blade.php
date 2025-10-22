<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Tipo de Conteúdo </span> - Visualizar Tipo de Conteúdo</h3>
                <a class="btn btn-primary" href="{{ route('tipo-conteudo.index') }}">Listar Tipo de Conteúdo</a>

            </div>


            <div class="col-5">

                <div class="row">

                    <div class="col-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-2">

                        <div class="form-group m-0">
                            <label for="">Tipo</label>
                            <input id="tipo" class="form-control" type="text" name="tipo" 
                              value="{{ $modelTipoConteudo->tipo }}" disabled>
                        </div>
                    
                    </div>

                    
                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <input id="status" class="form-control" type="text" name="status" 
                              value="{{ $modelTipoConteudo->status == 1 ? "Ativo" : "Inativo" }}" disabled>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-layout>