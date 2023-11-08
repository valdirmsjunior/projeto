<?php

namespace App\Repositories;

use App\Models\TipoContrato;
use Exception;

class TipoContratoRepository 
{
    protected $model;

    public function __construct(TipoContrato $model)
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
                ->prepend('Escolha a opção');
        } catch (Exception $e) {
            return [
                '' => $e->getMessage()
            ];
        }
    }
}