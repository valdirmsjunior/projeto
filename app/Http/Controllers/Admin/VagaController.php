<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vaga\StoreVagaRequest;
use App\Models\Vaga;
use App\Repositories\TipoContratoRepository;
use App\Repositories\VagaRepository;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    public function __construct(
        VagaRepository $vagaRepository,
        TipoContratoRepository $tipoContratoRepository
    )
    {
        $this->vagaRepository = $vagaRepository;
        $this->tipoContratoRepository = $tipoContratoRepository;
    }

    public function index(Request $request)
    { 
        $vagas = $this->vagaRepository->paginate(20, 'nome'); 
        
        return view('admin.vagas.index', [
            'vagas' => $vagas,
            'tipos_contrato' => $this->tipoContratoRepository->selectOption()
        ])->with($request->flash());
    }

    public function create()
    {
        return view('admin.vagas.create', [
            'tipo_contratos' => $this->tipoContratoRepository->selectOption()
        ]);
    }

    public function store(StoreVagaRequest $request)
    {
        $result = $this->vagaRepository->store($request->except(['_token']));

        if ($result === true) {
            flash('Vaga cadastrada com sucesso!')->success();

            return redirect()->route('admin.vagas.index');
        }

        flash('Erro ao cadastrar a vaga! '.$result)->error();

        return redirect()->route('admin.vagas.create');
    }

    public function edit(Vaga $vaga)
    {
        return view('admin.vagas.edit', [
            'vagas' => $vaga,
            'tipo_contratos' => $this->tipoContratoRepository->selectOption()
        ]);
    }

    public function update(Request $request, Vaga $vaga)
    {
        $result = $this->vagaRepository->update($vaga, $request->except(['_token']));

        if ($result === true) {
            flash('Vaga atualizada com sucesso!')->success();

            return redirect()->route('admin.vagas.index');
        }

        flash('Erro ao atualizar a vaga! '.$result)->error();

        return redirect()->route('admin.vagas.edit', [
            'vaga' => $vaga
        ]);
    }

    public function destroy(Vaga $vaga)
    {
        $result = $this->vagaRepository->destroy($vaga);

        if ($result === true) {
            flash('Vaga deletada com sucesso!')->success();

            return redirect()->route('admin.vagas.index');
        }

        flash('Erro ao excluir a vaga! '.$result)->error();
    }
}
