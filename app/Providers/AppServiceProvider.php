<?php

namespace App\Providers;

use App\Models\Perfil;
use App\Models\User;
use App\Repositories\PerfilRepository;
use App\Repositories\UserRepository;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
