<?php

Route::group(['namespace' => 'App\Http\Controllers\Site', 'middleware' => ['web']], function () {
    Route::get('/', 'PageController@showMainPage')->name('adfm.show.main-page');
    Route::get('/{slug}', 'PageController@showPage')->name('adfm.show.page');

    //TODO В РАЗРАБОТКЕ
    Route::get('/{slugPage}/{slugBlog}', 'PageController@showPageWith')->name('adfm.show.page-with');
});

Route::post('message', 'App\Http\Controllers\Admin\FeedbackController@store')->name('adfm.feedbacks.store')->middleware('web');
