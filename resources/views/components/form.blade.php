@props([
    'title' => '',
    'subtitle' => '',
    'action' => '#',
    'method' => 'get',
    'routeBack' => url()->previous(),
    'model' => [],
    'size' => 12
])

@if ($method == 'GET' || $method == 'POST')
    {!! 
        Form::open([
            'url' => $action,
            'class' => '',
            'files' => 'true',
            'method' => $method
        ])
    !!}
@elseif ($method == 'PUT' || $method == 'DELETE')
    {!!
        Form::model($model, [
            'url' => $action,
            'class' => '',
            'files' => 'true',
            'method' => 'post',
        ])
    !!}
    @method($method)
@endif

<div class="card">
    <div class="bg-transparent card-header">
        <h4 class="card-title text-uppercase">
            {{ $title }}
            <span class="badge bg-info text-uppercase fw-bold">{{ $subtitle }}</span>
        </h4>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    <div class="bg-transparent card-footer">
        <div class="row justify-content-end">
            <div class="col-6 col-sm-6 col-md-2 d-grid">
                <a class="btn btn-dark" href="{{ $routeBack }}">
                    <i class="fas fa-backward"></i> Voltar
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-2 d-grid">
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-save"></i> Salvar
                </button>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
