<?php

namespace App\Repositories;

use App\Models\Perfil;
use Exception;

class PerfilRepository 
{
    protected $model;

    public function __construct(Perfil $model)
    {
        $this->model = $model;
    }

    public function selectOption()
    {
        try {
            return $this->model
                ->all()
                ->sortBy('nome')
                ->pluck('nome', 'id')
                ->prepend('Selecione o Perfil:');
        } catch (Exception $e) {
            return [
                '' => $e->getMessage()
            ];
        }
    }
}