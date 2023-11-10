<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\VagaRepository;

class HomeController extends Controller
{

    public function __construct(VagaRepository $vagaRepository)
    {
        $this->vagaRepository = $vagaRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vagas = $this->vagaRepository->paginate(10, 'nome');

        return view('usuarios.index', [
            'vagas' => $vagas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
