<?php

namespace App\Providers;

use App\Http\Controllers\API\V1\AuthLoginController;
use App\Http\Controllers\API\V1\AuthRegisterController;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserEloquentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->when(AuthLoginController::class)
            ->needs(UserRepositoryInterface::class)
            ->give(UserEloquentRepository::class);

        $this->app->when(AuthRegisterController::class)
            ->needs(UserRepositoryInterface::class)
            ->give(UserEloquentRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
