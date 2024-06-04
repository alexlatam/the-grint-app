<?php

namespace App\Providers;

use App\Http\Controllers\API\V1\Advertisement\StoreAdvertisementController;
use App\Http\Controllers\API\V1\Auth\AuthLoginController;
use App\Http\Controllers\API\V1\Auth\AuthRegisterController;
use App\Repositories\AdvertisementRepository;
use App\Repositories\Contracts\AdvertisementRepositoryInterface;
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

        $this->app->when(StoreAdvertisementController::class)
            ->needs(UserRepositoryInterface::class)
            ->give(UserEloquentRepository::class);

        $this->app->when(StoreAdvertisementController::class)
            ->needs(AdvertisementRepositoryInterface::class)
            ->give(AdvertisementRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
