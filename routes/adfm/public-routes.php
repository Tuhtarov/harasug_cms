<?php

use Illuminate\Support\Facades\Route;

/* Роуты для кафе. */
Route::name('cafe.')
    ->namespace('App\Http\Controllers\Modules\Cafe')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/cafe', 'IndexController')->name('index');
    });

/* Роуты для галереи. */
Route::name('gallery.')
    ->namespace('App\Http\Controllers\Modules\Gallery')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/gallery', 'IndexController')->name('index');
        Route::get('/gallery/{slug}', 'ShowController')->name('show');
    });

/* Роуты для отдыха. */
Route::name('chill.')
    ->namespace('App\Http\Controllers\Modules\Chill')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/chill', 'IndexController')->name('index');
        Route::get('/chill/{slug}', 'ShowController')->name('show');
    });

/* Роуты для бронирования. */
Route::name('reservation.')
    ->namespace('App\Http\Controllers\Modules\Reservation')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/reservation', 'IndexController')->name('index');
    });

/* Роуты для отзывов. */
Route::name('comment.')
    ->namespace('App\Http\Controllers\Modules\Comment')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/comments', 'IndexController')->name('index');
        Route::post('/comments/create', 'CreateController')->name('create');
    });

/* Роуты для новостей. */
Route::group(['namespace' => 'App\Http\Controllers\Site'], function () {
    Route::get('/news', 'NewsController@showNewsList')->name('adfm.show.news-list');
    Route::get('/news/{year}/{month}/{day}/{slug}', 'NewsController@showNewsPage')->name('adfm.show.news-page');
});

/* Роуты для юрт. */
Route::name('home.')
    ->namespace('App\Http\Controllers\Modules\Home')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/home/{slug}', 'ShowController')->name('show');
    });

/* Роуты для about. */
Route::name('about.')
    ->namespace('App\Http\Controllers\Modules\About')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/about/{slug}', 'ShowController')->name('show');
    });


/* Роуты для обратной связи. */
Route::name('message.')
    ->namespace('App\Http\Controllers\Modules\Message')
    ->middleware(['web'])
    ->group(function () {
        Route::post('/message/create', 'CreateController')->name('create');
    });

/* Роуты для вопросов-ответов. */
Route::name('qa.')
    ->namespace('App\Http\Controllers\Modules\Qa')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/qa', 'IndexController')->name('index');
    });

/* Роуты для статичных страниц. */
Route::group(['namespace' => 'App\Http\Controllers\Site', 'middleware' => ['web']], function () {
    Route::get('/', 'PageController@showMainPage')->name('adfm.show.main-page');
    Route::get('/{slug}', 'PageController@showPage')->name('adfm.show.page');
});

Route::post('message',
    'App\Http\Controllers\Admin\FeedbackController@store')->name('adfm.feedbacks.store')->middleware('web');
