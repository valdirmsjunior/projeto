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

    public function paginate($paginate = 20, $orderBy, $sort = 'ASC', $columns = null)
    {
        try {
            $query = $this->model->query();
            $query->select('vagas.*','candidatos_vagas.vaga_id','candidatos_vagas.usuario_id','candidatos_vagas.ativo');
            $query->leftjoin('candidatos_vagas', function( $join){
                $join->on('candidatos_vagas.vaga_id', '=', 'vagas.id');
                $join->on('candidatos_vagas.ativo',DB::raw("'true'"));
                    
            });

            $vagas = request()->only('nome', 'tipo_contrato_id');
            
            foreach ($vagas as $nome => $valor) {
                if($valor){
                    $query->where($nome, 'ilike', '%'. $valor. '%');
                }
            }
            
            $query->orderBy($orderBy, $sort);
            return $query->paginate($paginate);
        } catch (Exception $e) {
            return $e->getMessage();
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