<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Professor </span> - Visualizar Professor</h3>
                <a class="btn btn-primary" href="{{ route('professor.index') }}">Listar Professores</a>

            </div>

            <div class="col-8">

                <div class="row">

                    <div class="col-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">

                         <div class="form-group m-0">
                            <label for="">Registro</label>
                            <input class="form-control" type="text" name="registro" id="registro"
                            value="{{ $modelProfessor->registro }}" disabled>
                        </div>

                    </div>

                    <div class="col-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5 my-2">

                        <div class="form-group m-0">
                            <label for="">Professor</label>
                            <input class="form-control" type="text" name="id_professor" id="id_professor"
                            value="{{ $modelProfessor->usuario->name }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5 my-2">

                        <div class="form-group m-0">
                            <label for="">Escola</label>
                               <input class="form-control" type="text" name="id_escola" id="id_escola"
                            value="{{ $modelProfessor->escola->razao_social }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 my-2">

                         <div class="form-group m-0">
                            <label for="">Status</label>
                               <input class="form-control" type="text" name="id_professor" id="id_professor"
                            value="{{ $modelProfessor->status == 1 ? "Ativo" : "Inativo" }}" disabled>
                        </div>

                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 my-2">

                         <div class="form-group m-0">
                            <label for="">Salario</label>
                            <input class="form-control" type="text" name="salario" id="salario"
                            value="{{ $modelProfessor->salario }}" disabled>
                        </div>

                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 my-2">

                         <div class="form-group m-0">
                            <label for="">Telefone</label>
                            <input class="form-control" type="text" name="telefone" id="telefone"
                            value="{{ $modelProfessor->telefone }}" disabled>
                        </div>

                    </div>
                    
                    <div class="col-12">

                         <div class="form-group my-2">
                            <label for="">Observação</label>
                            <textarea class="form-control" name="observacao" id="observacao" rows="3" disabled>{{ $modelProfessor->observacao }}</textarea>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-layout>