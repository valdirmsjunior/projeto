<?php 

namespace App\Repositories;

use App\Models\CandidatoVaga;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeRepository
{
    protected $model;

    public function __construct(CandidatoVaga $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        //
    }

    public function store($vaga, $data)
    {
        $usuario_id = Auth::user()->id;
        try {
            DB::beginTransaction();
            $candidatoVaga = new $this->model($data);
            $candidatoVaga->usuario_id = $usuario_id;
            $candidatoVaga->vaga_id = $vaga->id;
            
            $candidatoVaga->save();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}