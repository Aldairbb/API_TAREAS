<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Contracts\RepositorioTareaInterface;
use App\Http\Repositories\TareaRepositorio;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositorioTareaInterface::class, TareaRepositorio::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
