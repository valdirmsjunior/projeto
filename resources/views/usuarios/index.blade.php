@extends('layouts.app')

@section('breadcrumb')

<x-breadcrumb title="Usuários" />

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <x-table
            title="Vagas"
            subtitle="Disponibilidade de Vagas"
            :headers="['Nome', 'Tipo de Contrato', 'Quantidade de Vagas','Status' ,'Ações']"
            :records="$vagas"
        >
            <x-slot name="slot">
                @forelse ($vagas as $vagaKey => $vaga)
                 
                <tr class="text-center align-middle">
                    <td class="text-center align-middle">{{ $vaga->nome }}</td>
                    <td class="text-center align-middle">{{ $vaga->tipo_contrato_id ? $vaga->tipoContrato->nome : ""}}</td>
                    <td class="text-center align-middle">{{ $vaga->quantidade_vagas }}</td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn rounded-pill {{$vaga->status->backgroundColor()}}" disabled>
                            <span>{{ $vaga->status }} </span>
                        </button>
                    </td>
                    <td class="text-center align-middle">
                        <button class="rounded-pill btn btn-info" type="button" >
                            <span>Candidatar-se</span>
                        </button>
                    </td>
                </tr>
                
                @empty
                @endforelse
                
            </x-slot>
        </x-table>
    </div>
</div>

@endsection