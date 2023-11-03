<?php 

namespace App\Repositories;

use App\Enums\Perfil;
use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function paginate($paginate = 10, $orderBy, $sort = 'ASC', $columns = null)
    {
        try {
            $query = $this->model->query();
            $query->select('users.*');
            $query->join('perfis', 'perfis.id', '=', 'users.perfil_id');
            $query->where('perfis.codigo', Perfil::ADMIN);
            $query->orWhere('perfis.codigo', Perfil::CANDIDATO);
            $query->orderBy($orderBy, $sort);

            //dd($query->toSql());
            return $query->paginate($paginate);
        } catch (Exception $e) {
            return [];
        }
    }
}