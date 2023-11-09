<div class="mb-3 row"> 
    
    <div class="col-md-3">
        <x-form-label for="name" class="form-label" name="Nome" required />
        {!!
            Form::text('name', old('name', isset($usuarios) ? $usuarios->name : ''), [
                'id' => 'name',
                'class' => 'form-control '.($errors->has('name') ? 'is-invalid' : '')
            ])
        !!}
        <x-form-error :message="$errors->first('name')" />
    </div>

    <div class="col-md-3">
        <x-form-label for="password" class="form-label" name="Senha" required />
        {!!
            Form::password('password', [
                'id' => 'password',
                'class' => 'form-control '.($errors->has('password') ? 'is-invalid' : '')
            ])
        !!}
        <x-form-error :message="$errors->first('password')" />
    </div>

    <div class="col-md-3">
        <x-form-label for="email" class="form-label" name="Email" required />
        {!!
            Form::text('email', old('email', isset($usuarios) ? $usuarios->email : ''), [
                'id' => 'email',
                'class' => 'form-control '.($errors->has('email') ? 'is-invalid' : '')
            ])
        !!}
        <x-form-error :message="$errors->first('email')" />
    </div>
    
    <div class="col-md-3">
        <x-form-label for="perfil_id" class="form-label" name="Perfil" required />
        {!!
            Form::select('perfil_id',$perfis, old('perfil_id', isset($usuarios) ? $usuarios->perfil_id : ''), [
                'id' => 'perfil_id',
                'class' => 'form-control '.($errors->has('perfil_id') ? 'is-invalid' : '')
            ])
        !!}
        <x-form-error :message="$errors->first('perfil_id')" />
    </div>
</div>