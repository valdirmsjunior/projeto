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
                    <td>{{ $vaga->nome }}</td>
                    <td>{{ $vaga->tipo_contrato_id ? $vaga->tipoContrato->nome : ""}}</td>
                    <td>{{ $vaga->quantidade_vagas }}</td>
                    <td>{{ $vaga->status }}</td>
                    <td>
                        <div class="dropdown dropup">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu-{{ $vagaKey }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </button>
                            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu-{{ $vagaKey }}" >
                                <a
                                    class="dropdown-item"
                                    href="#"
                                >
                                    <i class="fas fa-pencil-alt"></i> Editar
                                </a>

                                <div class="dropdown-divider"></div>

                                <a
                                    class=" dropdown-item text-danger"
                                    data-toggle="modal" data-target="#ModalDelete_{{$vaga->id}}" title="Deletar"
                                >
                                    <i class="fas fa-trash-alt"></i> Deletar
                                </a>
                                
                            </div>
                            {{-- @include('admin.vagas.partials.modal-delete') --}}
                        </div>
                        
                    </td>
                </tr>
                
                @empty
                @endforelse
                
            </x-slot>
        </x-table>
    </div>
</div>

@endsection