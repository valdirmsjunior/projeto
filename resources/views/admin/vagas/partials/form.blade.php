<div class="mb-3 row">
    <div class="col-md-4">
        <x-form-label for="vaga" class="form-label" name="Vaga" required />
        {!!
            Form::text('vaga', old('vaga', isset($vagas) ? $vagas->vaga : ''), [
                'id' => 'vaga',
                'class' => 'form-control '.($errors->has('vaga') ? 'is-invalid' : '')
            ])
        !!}
        <x-form-error :message="$errors->first('vaga')" />
    </div>

    <div class="col-md-4">
        <x-form-label for="tipo_contrato_id" class="form-label" name="Tipo Contrato" required />
        {!!
            Form::select('tipo_contrato_id',$tipo_contratos, old('tipo_contrato_id', isset($vagas) ? $vagas->tipo_contrato_id : ''), [
                'id' => 'tipo_contrato_id',
                'class' => 'form-control '.($errors->has('tipo_contrato_id') ? 'is-invalid' : '')
            ])
        !!}
        <x-form-error :message="$errors->first('tipo_contrato_id')" />
    </div>

    <div class="col-md-4">
        <x-form-label for="quantidade_vagas" class="form-label" name="Quantidade de Vagas" required />
        {!!
            Form::text('quantidade_vagas', old('quantidade_vagas', isset($vagas) ? $vagas->quantidade_vagas : ''), [
                'id' => 'quantidade_vagas',
                'class' => 'form-control '.($errors->has('quantidade_vagas') ? 'is-invalid' : '')
            ])
        !!}
        <x-form-error :message="$errors->first('quantidade_vagas')" />
    </div>
</div>