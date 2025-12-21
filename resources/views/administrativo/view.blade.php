<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Administrativo </span> - Visualizar Administrativo</h3>
                <a class="btn btn-primary" href="{{ route('administrativo.index') }}">Listar Administrativo</a>

            </div>


            <div class="col-10">

                <div class="row my-3">


                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">

                        <div class="form-group m-0">
                            <label for="">Usuário</label>
                            <input type="text" class="form-control" value="{{$modelAdministrativo->usuario->name}}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">

                        <div class="form-group m-0">
                            <label for="">Escola</label>
                            <input type="text" class="form-control" value="{{$modelAdministrativo->escola->razao_social}}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-lg-2 col-xl-2 col-xxl-2">

                        <div class="form-group m-0">
                            <label for="">Cargo</label>
                            <input type="text" class="form-control" value="{{$modelAdministrativo->cargo->titulo}}" disabled>
                        </div>

                    </div>


                </div>

            </div>

        </div>
    </div>

</x-layout>