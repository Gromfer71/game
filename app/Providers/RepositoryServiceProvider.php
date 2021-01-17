<?php

namespace App\Providers;

use App\Repositories\Write\WriteItemRepository;
use App\Repositories\Write\WriteUserRepository;
use App\Repositories\Write\WriteBuildingRepository;
use App\Repositories\Write\WriteMessageRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            WriteUserRepository::class
        );
        $this->app->bind(
            WriteMessageRepository::class
        );
        $this->app->bind(
            WriteBuildingRepository::class
        );
        $this->app->bind(
            WriteItemRepository::class
        );


    }
}
