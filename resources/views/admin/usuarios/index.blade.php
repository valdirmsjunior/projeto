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
            :headers="['Nome', 'E-mail', 'Perfil', 'Ações']"
            :records="$usuarios"
        >
            <x-slot name="slotButton">
                <div class="mb-3 row justify-content-end">
                    <div class="col-2 d-grid">
                        <a class="btn btn-info" href="#" role="button">
                            <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i> Usuário
                        </a>
                    </div>
                </div>
            </x-slot>
            @php
                //dd($usuarios->all());
            @endphp
            <x-slot name="slot">
                @forelse ($usuarios as $usuarioKey => $usuario)
                @php
                //dd($usuario->all());
            @endphp
                <tr class="text-center align-middle">
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->perfil_id ? $usuario->perfil->nome : ""}}</td>
                    <td>
                        <div class="dropdown dropup">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu-{{ $usuarioKey }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu-{{ $usuarioKey }}" style="">
                                <a
                                    class="dropdown-item"
                                    href="#"
                                >
                                    <i class="fas fa-pencil-alt"></i> Editar
                                </a>
                            </div>
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