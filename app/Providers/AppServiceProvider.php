<?php

namespace App\Providers;

use App\Contracts\Cafe\ICafe;
use App\Contracts\Chill\IChill;
use App\Contracts\Comment\IComment;
use App\Contracts\Gallery\IGallery;
use App\Contracts\Index\IAbout;
use App\Contracts\Index\IHome;
use App\Contracts\Index\IQuestionAnswer;
use App\Services\Chill\ChillService;
use App\Services\Gallery\GalleryService;
use App\Services\Index\AboutService;
use App\Services\Cafe\CafeService;
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
        $this->app->singleton(ICafe::class, CafeService::class);

        //О нас
        $this->app->singleton(IAbout::class, AboutService::class);

        //Юрты
        $this->app->singleton(IHome::class, HomeService::class);

        //Вопросы-ответы
        $this->app->singleton(IQuestionAnswer::class, QaService::class);

        //Отзывы
        $this->app->singleton(IComment::class, CommentService::class);

        //Отдых
        $this->app->singleton(IChill::class, ChillService::class);

        //Галерея
        $this->app->singleton(IGallery::class, GalleryService::class);
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
