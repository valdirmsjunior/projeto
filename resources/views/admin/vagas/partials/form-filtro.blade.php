<div class="row">
    <div class="col-12">
        {!! Form::open(['route' => 'admin.vagas.index', 'method' => 'get', 'class' => 'form-reset']) !!}
            <div class="card">
                <div class="card-body border-bottom">
                    <h4 class="card-title">Filtros</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome</label>
                            {!! 
                                Form::text('nome', '', [
                                    'id' => 'nome',
                                    'class' => 'form-control'
                                ]) 
                            !!}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tipo_contrato_id">Tipos de Contrato</label>
                            {!!
                                Form::select('tipo_contrato_id', $tipos_contrato, null, [
                                    'id' => 'tipo_contrato_id', 
                                    'class' => 'form-control'
                                 ]) 
                            !!}
                        </div>
                    </div>
                </div>
                <div class="p-3 border-top">
                    <div class="row">
                        <div class="col-6 offset-md-8 col-md-2">
                            <button type="button" class="btn btn-block btn-info" onclick="resetForm()">
                                Limpar
                            </button>
                        </div>
                        <div class="col-6 col-md-2">
                            <button type="submit" class="btn btn-block btn-success">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>