<?php /** @noinspection GrazieInspection */

/** @noinspection GrazieInspection */

/** @noinspection GrazieInspection */

/** @noinspection GrazieInspection */

/** @noinspection ALL */

/** @noinspection ALL */

/** @noinspection ALL */

/** @noinspection ALL */

namespace App\Providers;

use App\Services\BuildingsHandler;
use App\Services\ItemHandler;
use App\Services\MailHandler;
use App\Services\TroopHandler;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application staff.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }
        $this->app->singleton(BuildingsHandler::class);
        $this->app->singleton(TroopHandler::class);
        $this->app->singleton(MailHandler::class);
        $this->app->singleton(ItemHandler::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
