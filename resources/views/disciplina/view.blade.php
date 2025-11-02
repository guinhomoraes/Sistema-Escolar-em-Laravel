<x-layout>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 d-flex justify-content-between 
                        align-items-end border-bottom border-secondary py-3">

                <h3 class="my-0"> <span class="font-weight-bold"> Disciplina </span> - Visualizar Disciplina</h3>
                <a class="btn btn-primary" href="{{ route('disciplina.index') }}">Listar Disciplinas</a>

            </div>

            <div class="col-5">

                <div class="row">

                     <div class="col-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 my-2">

                        <div class="form-group m-0">
                            <label for="">Nome</label>
                            <input id="nome" class="form-control" type="text" name="nome" 
                              value="{{ $modelDisciplina->nome }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4 my-2">

                        <div class="form-group m-0">
                            <label for="">Status</label>
                            <input id="status" class="form-control" type="text" name="status" 
                              value="{{ $modelDisciplina->status == 1 ? "Ativo" : "Inativo" }}" disabled>
                        </div>

                    </div>

                    <div class="col-12 my-2">

                        <div class="form-group m-0">
                            <label for="">Descrição</label>
                            <input id="descricao" class="form-control" type="text" name="descricao" 
                              value="{{ $modelDisciplina->descricao }}" disabled>
                        </div>
                    
                    </div>

                    <div class="col-12 my-2">

                        <div class="form-group m-0">
                            <label for="">Observação</label>
                            <textarea class="form-control" name="observacao" id="observacao" rows="7" disabled>{{ $modelDisciplina->observacao }}</textarea>
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