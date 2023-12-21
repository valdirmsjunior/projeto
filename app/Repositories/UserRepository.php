<?php 

namespace App\Repositories;

use App\Enums\Perfil;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function paginate($paginate = 20, $orderBy, $sort, $columns = null)
    { 
        try {
            $query = $this->model->query();
            $usuarios = request()->only('name', 'email', 'perfil_id');

            foreach ($usuarios as $nome => $valor) {
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
            $usuario = new $this->model($data);
            $usuario->perfil_id = $data['perfil_id'];
            $usuario->password = Hash::make($data['password']);
            
            $usuario->save();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function update(User $usuario, $data)
    {
        try {
            $usuario->fill($data);
            $usuario->perfil_id = $data['perfil_id'];
            $usuario->password = md5($data['password']);
            $usuario->save();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($usuario)
    {
        try {
            $usuario->delete();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}