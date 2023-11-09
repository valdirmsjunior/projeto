@extends('layouts.app')

@section('breadcrumb')

<x-breadcrumb title="Vagas" />

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <x-form
            title="Usuário"
            subtitle="Edição"
            :action=" route('admin.vagas.update', $vagas)"
            method="PUT"
            :routeBack="route('admin.vagas.index')"
        >
            @include('admin.vagas.partials.form')
        </x-form>
    </div>
</div>

@endsection