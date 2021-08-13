<?php

use App\Http\Controllers\Modules\CafeController;
use App\Http\Controllers\Modules\CommentController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Modules', 'middleware' => ['web']], function () {
    Route::get('/cafe', [CafeController::class, 'index'])->name('cafe.index');

    //роуты для отзывов
    Route::get('/comments', [CommentController::class, 'index'])->name('comment.index');
    Route::post('/comments/create', [CommentController::class, 'create'])->name('comment.create');
});


Route::group(['namespace' => 'App\Http\Controllers\Site', 'middleware' => ['web']], function () {
    Route::get('/', 'PageController@showMainPage')->name('adfm.show.main-page');
    Route::get('/{slug}', 'PageController@showPage')->name('adfm.show.page');
});

Route::post('message', 'App\Http\Controllers\Admin\FeedbackController@store')->name('adfm.feedbacks.store')->middleware('web');
