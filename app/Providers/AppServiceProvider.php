<?php

namespace App\Providers;

use App\Contracts\Cafe\CafeInterface;
use App\Contracts\Feedback\CommentsInterface;
use App\Contracts\Index\AboutCardsInterface;
use App\Contracts\Index\HomesInterface;
use App\Contracts\Index\QuestionsAnswerInterface;
use App\Services\Index\AboutCards;
use App\Services\Cafe\Cafe;
use App\Services\Index\Homes;
use App\Services\Index\QA;
use App\Services\Feedback\Comment as CommentService;
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
        $this->app->singleton(CafeInterface::class, Cafe::class);

        //О нас
        $this->app->singleton(AboutCardsInterface::class, AboutCards::class);

        //Юрты
        $this->app->singleton(HomesInterface::class, Homes::class);

        //Вопросы-ответы
        $this->app->singleton(QuestionsAnswerInterface::class, QA::class);

        //Отзывы
        $this->app->singleton(CommentsInterface::class, CommentService::class);
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
