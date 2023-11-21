<?php

namespace App\Repositories;

use Exception;
use DB;

use Illuminate\Support\Str;

use App\Models\Vaga;


class VagaRepository 
{
    protected $model;

    public function __construct(Vaga $model)
    {
        $this->model = $model;
    }

    public function paginate($paginate = 20, $orderBy, $sort = 'ASC')
    {
        try {
            $query = $this->model->query();
            $query->select('vagas.*');
            $query->join('tipos_contrato', 'tipos_contrato.id', '=', 'vagas.tipo_contrato_id');
            $query->orderBy($orderBy, $sort);
            
            return $query->paginate($paginate);
        } catch (Exception $e) {
            return [];
        }
    }

    public function paginateWhere($paginate = 20, $orderBy, $sort = 'ASC', $columns = null)
    {
        try {
            $query = $this->model->query();
            $vagas = request()->only('nome', 'tipo_contrato_id');

            foreach ($vagas as $nome => $valor) {
                if($valor){
                    $query->where($nome, 'ilike', '%'. $valor. '%');
                }
            }
            $query->orderBy($orderBy, $sort);
            return $query->paginate($paginate);
        } catch (Exception $e) {
            return [];
        }
    }

    public function store($data)
    { 
        try {
            DB::beginTransaction();

            $vaga = new $this->model($data);
            $vaga->nome = $data['nome'];

            $vaga->save();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function update(Vaga $vaga, $data)
    {
        try {
            $vaga->fill($data);
            $vaga->save();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($data)
    {
        try {
            $data->delete();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}