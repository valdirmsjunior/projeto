<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\StoreUserRequest;
use App\Http\Requests\Usuario\UpdateUserRequest;
use App\Models\User;
use App\Repositories\PerfilRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    public function __construct(UserRepository $userRepository, PerfilRepository $perfilRepository)
    {
        $this->userRepository = $userRepository;
        $this->perfilRepository = $perfilRepository;
    }

    public function index(Request $request)
    {
        $usuarios = $this->userRepository->paginate(20, 'name', 'ASC');

        return view('admin.usuarios.index', [
            'usuarios' => $usuarios,
            'perfis' => $this->perfilRepository->selectOption()
        ])->with($request->flash());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.create', [
            'perfis' => $this->perfilRepository->selectOption()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $result = $this->userRepository->store($request->except(['_token']));

        if ($result === true) {
            flash('Usuario cadastrado com sucesso')->success();

            return redirect()->route('admin.usuarios.index');
        }

        flash('Erro ao cadastrar usuario')->error();

        return redirect()->route('admin.usuarios.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        return view('admin.usuarios.edit', [
            'usuarios' => $usuario,
            'perfis' => $this->perfilRepository->selectOption()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $usuario)
    {
        $result = $this->userRepository->update($usuario, $request->except(['_token']));

        if ($result === true) {
            flash('Usuario atualizado com sucesso!')->success();

            return redirect()->route('admin.usuarios.index');
        }

        flash('Erro ao atualizar o usuario! '.$result)->error();

        return redirect()->route('admin.usuarios.edit', [
            'usuario' => $usuario
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( User $usuario)
    {
        $result = $this->userRepository->destroy($usuario);

        if ($result === true) {
            flash('Usuario deletado com sucesso!')->success();

            return redirect()->route('admin.usuarios.index');
        }

        flash('Erro ao deletar o usuario! '.$result)->error();

    }
}
