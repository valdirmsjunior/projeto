@extends('layouts.app')

@section('breadcrumb')

<x-breadcrumb title="Vagas" />

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <x-form
            title="Vagas"
            subtitle="Novo"
            :action=" route('admin.vagas.store')"
            method="POST"
            :routeBack="route('admin.vagas.index')"
        >
            @include('admin.vagas.partials.form')
        </x-form>
    </div>
</div>

@endsection