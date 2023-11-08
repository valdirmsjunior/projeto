@extends('layouts.app')

@section('breadcrumb')

<x-breadcrumb title="Usuários" />

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <x-form
            title="Usuário"
            subtitle="Edição"
            :action=" route('admin.usuarios.update', $usuarios)"
            method="PUT"
            :routeBack="route('admin.usuarios.index')"
        >
            @include('admin.usuarios.partials.form')
        </x-form>
    </div>
</div>

@endsection
