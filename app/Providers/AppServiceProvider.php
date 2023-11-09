<?php

namespace App\Providers;

use App\Models\Perfil;
use App\Models\TipoContrato;
use App\Models\User;
use App\Models\Vaga;
use App\Repositories\PerfilRepository;
use App\Repositories\TipoContratoRepository;
use App\Repositories\UserRepository;
use App\Repositories\VagaRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, function($app) {
            return new UserRepository(new User());
        });

        $this->app->bind(PerfilRepository::class, function($app) {
            return new PerfilRepository(new Perfil());
        });

        $this->app->bind(VagaRepository::class, function($app) {
            return new VagaRepository(new Vaga());
        });

        $this->app->bind(TipoContratoRepository::class, function($app) {
            return new TipoContratoRepository(new TipoContrato());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
