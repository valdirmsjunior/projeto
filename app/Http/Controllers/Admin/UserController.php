<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        if (count($request->all()) > 0) {
            $usuarios = $this->userRepository->paginateWhere(10, 'name', 'ASC', $request->except(['_token', 'page']));
        } else {
            $usuarios = $this->userRepository->paginate(10, 'name');
        }

        return view('admin.usuarios.index', [
            'usuarios' => $usuarios
        ]);
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
    public function store(Request $request)
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
