<?php 

namespace App\Repositories;

use App\Enums\Perfil;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

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

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $usuario = new $this->model($data);
            $usuario->perfil_id = $data['perfil_id'];
            $usuario->password = md5($data['password']);
            
            $usuario->save();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}