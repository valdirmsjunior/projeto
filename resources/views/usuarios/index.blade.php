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
                        
                            @if (Auth::user()->id === $vaga->usuario_id)
                            <button class="text-white shadow-lg border-warning rounded-pill btn btn-warning" type="button" data-toggle='modal' data-target="#candidato-modal-{{$vaga->id}}" disabled>
                                <span>Concorrendo</span> 
                            @else
                            <button class="rounded-pill btn btn-info" type="button" data-toggle='modal' data-target="#candidato-modal-{{$vaga->id}}" >
                                <span>Candidatar-se</span>
                            @endif
                            
                        </button>
                    </td>
                </tr>
                
                <x-modal 
                    title="Candidatar-se"
                    target="candidato-modal-{{$vaga->id}}"
                    action="{{ route('usuarios.store', $vaga) }}"
                    message="Deseja se candidatar a essa vaga?"
                    size="md"
                >
                
                    <div class="row">
                        <div class="col-md-12">
                            <span class="font-weight-bold">Vaga: </span>
                            {{ $vaga->nome }}
                        </div>
                    </div>
                    
                </x-modal>
                
                @empty
                @endforelse
                
            </x-slot>
        </x-table>
    </div>
</div>

@endsection