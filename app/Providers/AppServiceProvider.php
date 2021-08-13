<?php

namespace App\Providers;

use App\Contracts\Cafe\CafeInterface;
use App\Contracts\Feedback\CommentInterface;
use App\Contracts\Index\AboutInterface;
use App\Contracts\Index\HomeInterface;
use App\Contracts\Index\QaInterface;
use App\Services\Index\AboutService;
use App\Services\Cafe\CafeService;
use App\Services\Index\HomeService;
use App\Services\Index\QaService;
use App\Services\Feedback\CommentService as CommentService;
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
        $this->app->singleton(CafeInterface::class, CafeService::class);

        //О нас
        $this->app->singleton(AboutInterface::class, AboutService::class);

        //Юрты
        $this->app->singleton(HomeInterface::class, HomeService::class);

        //Вопросы-ответы
        $this->app->singleton(QaInterface::class, QaService::class);

        //Отзывы
        $this->app->singleton(CommentInterface::class, CommentService::class);
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
