<?php

namespace App\Providers;

use App\Contracts\Cafe\ICafe;
use App\Contracts\Comment\IComment;
use App\Contracts\Index\IAbout;
use App\Contracts\Index\IHome;
use App\Contracts\Index\IQuestionAnswer;
use App\Services\Index\AboutService;
use App\Services\Cafe\ICafeService;
use App\Services\Index\HomeService;
use App\Services\Index\QaService;
use App\Services\Comment\CommentService;
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
        $this->app->singleton(ICafe::class, ICafeService::class);

        //О нас
        $this->app->singleton(IAbout::class, AboutService::class);

        //Юрты
        $this->app->singleton(IHome::class, HomeService::class);

        //Вопросы-ответы
        $this->app->singleton(IQuestionAnswer::class, QaService::class);

        //Отзывы
        $this->app->singleton(IComment::class, CommentService::class);
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
