<?php

use App\Http\Controllers\Modules\CafeController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Modules\Cafe', 'middleware' => ['web']], function () {
    Route::get('/cafe', [CafeController::class, 'index'])->name('cafe.index');
});


/*
 * Роуты для комментариев.
*/
Route::group(['namespace' => 'App\Http\Controllers\Modules\Comment', 'middleware' => ['web']], function () {
    Route::get('/comments', 'IndexController')->name('comment.index');
    Route::post('/comments/create', 'CreateController')->name('comment.create');
});


Route::group(['namespace' => 'App\Http\Controllers\Site', 'middleware' => ['web']], function () {
    Route::get('/', 'PageController@showMainPage')->name('adfm.show.main-page');
    Route::get('/{slug}', 'PageController@showPage')->name('adfm.show.page');
});

Route::post('message', 'App\Http\Controllers\Admin\FeedbackController@store')->name('adfm.feedbacks.store')->middleware('web');
