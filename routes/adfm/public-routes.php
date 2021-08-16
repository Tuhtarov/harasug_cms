<?php

use App\Http\Controllers\Modules\Cafe\CafeController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Modules\Cafe', 'middleware' => ['web']], function () {
    Route::get('/cafe', [CafeController::class, 'index'])->name('cafe.index');
});

/* Роуты для новостей. */
Route::group(['namespace' => 'App\Http\Controllers\Site'], function () {
    Route::get('/news', 'NewsController@showNewsList')->name('adfm.show.news-list');
    Route::get('/news/{year}/{month}/{day}/{slug}', 'NewsController@showNewsPage')->name('adfm.show.news-page');
});

/* Роуты для комментариев. */
Route::group(['namespace' => 'App\Http\Controllers\Modules\Comment', 'middleware' => ['web']], function () {
    Route::get('/comments', 'IndexController')->name('comment.index');
    Route::post('/comments/create', 'CreateController')->name('comment.create');
});

/* Роуты для отдыха. */
Route::group(['name' => 'chill.', 'namespace' => 'App\Http\Controllers\Modules\Chill', 'middleware' => ['web']], function () {
    Route::get('/chill', 'IndexController')->name('index');
    Route::get('/chill/{slug}', 'ShowController')->name('show');
});

/* Роуты для отдыха. */
Route::group(['name' => 'gallery.', 'namespace' => 'App\Http\Controllers\Modules\Gallery', 'middleware' => ['web']], function () {
    Route::get('/gallery', 'IndexController')->name('index');
    Route::get('/gallery/{slug}', 'ShowController')->name('show');
});

Route::group(['namespace' => 'App\Http\Controllers\Site', 'middleware' => ['web']], function () {
    //генератор страниц
    Route::get('/', 'PageController@showMainPage')->name('adfm.show.main-page');
    Route::get('/{slug}', 'PageController@showPage')->name('adfm.show.page');
});

Route::post('message',
    'App\Http\Controllers\Admin\FeedbackController@store')->name('adfm.feedbacks.store')->middleware('web');
