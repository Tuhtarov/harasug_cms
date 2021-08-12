<?php

namespace App\Providers;

use App\Contracts\Cafe\CafeInterface;
use App\Contracts\Index\AboutCardsInterface;
use App\Contracts\Index\HomesInterface;
use App\Contracts\Index\QuestionsAnswerInterface;
use App\Services\Index\AboutCards;
use App\Services\Cafe\Cafe;
use App\Services\Index\Homes;
use App\Services\Index\QA;
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
        //Кафе
        $cafeService = $this->app->make(Cafe::class);
        $this->app->instance(CafeInterface::class, $cafeService);

        //О нас
        $aboutCardsService = $this->app->make(AboutCards::class);
        $this->app->instance(AboutCardsInterface::class, $aboutCardsService);

        //Юрты
        $this->app->singleton(HomesInterface::class, Homes::class);

        //Юрты
        $this->app->singleton(QuestionsAnswerInterface::class, QA::class);
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
