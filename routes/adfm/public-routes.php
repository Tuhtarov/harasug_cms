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
    ->prefix('reservation')
    ->namespace('App\Http\Controllers\Modules\Reservation')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/', 'IndexController')->name('index');

        Route::get('/search', 'SearchController@showAvailableHomes')->name('search');

        Route::post('/check', 'CheckController@checkHome')->name('check-home');
        Route::post('/check/additional', 'CheckController@checkAdditional')->name('check-additional');

        Route::get('/confirm/show', 'ConfirmController@showForm')->name('confirm.show');
        Route::get('/confirm/additional/show', 'ConfirmController@showAdditional')->name('confirm.additional.show');

        Route::post('/booking', 'BookingController')->name('booking');
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
    Route::get('/news', 'NewsController@showNewsList')
        ->name('adfm.show.news-list');
    Route::get('/news/{year}/{month}/{day}/{slug}', 'NewsController@showNewsPage')
        ->name('adfm.show.news-page');
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
