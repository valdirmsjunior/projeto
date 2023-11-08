<?php

namespace Database\Seeders;

use App\Models\TipoContrato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            [
                'codigo' => 1,
                'nome' => 'CLT',
            ],
            [
                'codigo' => 2,
                'nome' => 'PESSOA JURIDICA',
            ],
            [
                'codigo' => 3,
                'nome' => 'FREELANCER',
            ],
        ];

        foreach ($tipos as $tipo) {
            $tipoSeeder = new TipoContrato($tipo);
            $tipoSeeder->save();
        }
    }
}
