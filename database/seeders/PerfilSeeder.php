<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perfis = [
            [
                'codigo' => 1,
                'nome' => ' Administrador',
            ],
            [
                'codigo' => 2,
                'nome' => ' Cidadao',
            ],
        ];

        foreach ($perfis as $perfil) {
            $perfilSeeder = new Perfil($perfil);
            $perfilSeeder->save();
        }
    }
}
