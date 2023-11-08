@extends('layouts.app')

@section('breadcrumb')

<x-breadcrumb title="Usuários" />

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <x-table
            title="Usuários"
            subtitle="Listagem de Usuários"
            :headers="['id' ,'Nome', 'E-mail', 'Perfil', 'Ações']"
            :records="$usuarios"
        >
            <x-slot name="slotButton">
                <div class="mb-3 row justify-content-end">
                    <div class="col-2 d-grid">
                        <a class="btn btn-info" href="{{route('admin.usuarios.create')}}" role="button">
                            <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i> Usuário
                        </a>
                    </div>
                </div>
            </x-slot>
            
            <x-slot name="slot">
                @forelse ($usuarios as $usuarioKey => $usuario)
                
                <tr class="text-center align-middle">
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->perfil_id ? $usuario->perfil->nome : ''}}</td>
                    <td>
                        <div class="dropdown dropup">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu-{{ $usuarioKey }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </button>
                            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu-{{ $usuarioKey }}" >
                                <a
                                    class="dropdown-item"
                                    href="{{ route('admin.usuarios.edit', $usuario) }}"
                                >
                                    <i class="fas fa-pencil-alt"></i> Editar
                                </a>

                                <div class="dropdown-divider"></div>

                                <a
                                    class=" dropdown-item text-danger"
                                    data-toggle="modal" data-target="#ModalDelete_{{$usuario->id}}" title="Deletar"
                                >
                                    <i class="fas fa-trash-alt"></i> Deletar
                                </a>
                                
                            </div>
                            @include('admin.usuarios.partials.modal-delete')
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