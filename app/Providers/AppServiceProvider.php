<?php

namespace App\Providers;

use App\Contracts\Cafe\CafeInterface;
use App\Services\Cafe\Cafe;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Регистрация сервиса по обработке данных для страницы Кафе
        $cafeService = $this->app->make(Cafe::class);
        $this->app->instance(CafeInterface::class, $cafeService);
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
