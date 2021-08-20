<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->middleware(['web', 'auth'])->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::get('/pages', 'PageController@index')->name('adfm.pages.index');
    Route::get('/pages/create', 'PageController@create')->name('adfm.pages.create');
    Route::post('/pages', 'PageController@store')->name('adfm.pages.store');
    Route::get('/pages/{id}/edit', 'PageController@edit')->name('adfm.pages.edit');
    Route::match(['put', 'patch'], '/pages/{id}', 'PageController@update')->name('adfm.pages.update');
    Route::delete('/pages/{id}', 'PageController@destroy')->name('adfm.pages.destroy');
    Route::get('/pages/{id}', 'PageController@restore')->name('adfm.pages.restore');
//Route::get('/pages/{id}/clone', 'PageController@clone');


    /* Роуты админки сгенерированные автоматически для Wtolk\Adfm\Controllers */
    Route::get('/menus', 'MenuController@index')->name('adfm.menus.index');
    Route::get('/menus/create', 'MenuController@create')->name('adfm.menus.create');
    Route::post('/menus', 'MenuController@store')->name('adfm.menus.store');
    Route::get('/menus/{id}/edit', 'MenuController@edit')->name('adfm.menus.edit');
    Route::match(['put', 'patch'], '/menus/{id}', 'MenuController@update')->name('adfm.menus.update');
    Route::delete('/menus/{id}', 'MenuController@destroy')->name('adfm.menus.destroy');


    /* Роуты админки сгенерированные автоматически для Wtolk\Adfm\Controllers */
    Route::get('/menuitems', 'MenuItemController@index')->name('adfm.menuitems.index');
    Route::get('/menuitems/create/{menu_id?}', 'MenuItemController@create')->name('adfm.menuitems.create');
    Route::get('/menuitems/create/{menu_id?}/{model_name}/{model_id}',
        'MenuItemController@createFromModel')->name('adfm.menuitems.createFromModel');
    Route::post('/menuitems', 'MenuItemController@store')->name('adfm.menuitems.store');
    Route::get('/menuitems/{id}/edit', 'MenuItemController@edit')->name('adfm.menuitems.edit');
    Route::match(['put', 'patch'], '/menuitems/{id}', 'MenuItemController@update')->name('adfm.menuitems.update');
    Route::delete('/menuitems/{id}', 'MenuItemController@destroy')->name('adfm.menuitems.destroy');


    /* Роуты админки сгенерированные автоматически для Wtolk\Adfm\Controllers */
    Route::get('/roles', 'RoleController@index')->name('adfm.roles.index');
    Route::get('/roles/create', 'RoleController@create')->name('adfm.roles.create');
    Route::post('/roles', 'RoleController@store')->name('adfm.roles.store');
    Route::get('/roles/{id}/edit', 'RoleController@edit')->name('adfm.roles.edit');
    Route::match(['put', 'patch'], '/roles/{id}', 'RoleController@update')->name('adfm.roles.update');
    Route::delete('/roles/{id}', 'RoleController@destroy')->name('adfm.roles.destroy');


    /* Роуты админки сгенерированные автоматически для App\Adfm\Controllers\Admin\UserController */
    Route::get('/users', 'UserController@index')->name('adfm.users.index');
    Route::get('/users/create', 'UserController@create')->name('adfm.users.create');
    Route::post('/users', 'UserController@store')->name('adfm.users.store');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('adfm.users.edit');
    Route::match(['put', 'patch'], '/users/{id}', 'UserController@update')->name('adfm.users.update');
    Route::delete('/users/{id}', 'UserController@destroy')->name('adfm.users.destroy');

    /* Роуты блоков */
    Route::get('/blocks', 'BlockController@index')->name('adfm.blocks.index');
    Route::get('/blocks/create', 'BlockController@create')->name('adfm.blocks.create');
    Route::post('blocks', 'BlockController@store')->name('adfm.blocks.store');
    Route::get('/blocks/{id}/edit', 'BlockController@edit')->name('adfm.blocks.edit');
    Route::match(['put', 'patch'], '/blocks/{id}', 'BlockController@update')->name('adfm.blocks.update');
    Route::delete('/blocks/{id}', 'BlockController@destroy')->name('adfm.blocks.destroy');


    /* Роуты для сообщений */
    Route::get('/feedbacks', 'FeedbackController@index')->name('adfm.feedbacks.index');
    Route::get('/feedbacks/{id}/edit', 'FeedbackController@showMessageDetails')->name('adfm.feedbacks.edit');
    Route::delete('/feedbacks/{id}', 'FeedbackController@destroy')->name('adfm.feedbacks.destroy');
    \
    Route::get('/feedbacks', 'FeedbackController@index')->name('adfm.feedbacks.index');
    Route::get('/feedbacks/{id}/edit', 'FeedbackController@showMessageDetails')->name('adfm.feedbacks.edit');
    Route::delete('/feedbacks/{id}', 'FeedbackController@destroy')->name('adfm.feedbacks.destroy');
});

/* Редактирование публичной части с админки */
Route::prefix('/admin/public')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    /* Роуты для ресторана. */
    Route::prefix('/cafe')
        ->name('cafe.')
        ->namespace('App\Http\Controllers\Admin\Modules\Cafe')
        ->group(function () {

            /*Роуты для блюд*/
            Route::prefix('/record')->name('record.')
                ->group(function () {
                    Route::get('/create', 'CreateController@createRecord')->name('create');
                    Route::post('/store', 'StoreController@storeRecord')->name('store');
                    Route::post('/restore/{id}', 'RestoreController@restoreRecord')->name('restore')->whereNumber('id');
                    Route::get('/edit/{id}', 'EditController@editRecord')->name('edit')->whereNumber('id');
                    Route::delete('/delete/{id}', 'DeleteController@deleteRecord')->name('delete')->whereNumber('id');
                    Route::patch('/update/{id}', 'UpdateController@updateRecord')->name('update')->whereNumber('id');

                    Route::get('/{cafeType}', 'IndexController@indexRecord')->name('index');
                });

            /*Роуты для категорий*/
            Route::prefix('/category')->name('category.')
                ->group(function () {
                    Route::get('/', 'IndexController@indexCategory')->name('index');
                    Route::get('/create', 'CreateController@createCategory')->name('create');
                    Route::post('/store', 'StoreController@storeCategory')->name('store');
                    Route::post('/restore/{id}', 'RestoreController@restoreCategory')->name('restore')->whereNumber('id');
                    Route::get('/edit/{id}', 'EditController@editCategory')->name('edit')->whereNumber('id');
                    Route::delete('/delete/{id}', 'DeleteController@deleteCategory')->name('delete')->whereNumber('id');
                    Route::patch('/update/{id}', 'UpdateController@updateCategory')->name('update')->whereNumber('id');
                });

            /*Роуты для видов кафе*/
            Route::get('/', 'IndexController@indexCafe')->name('index');
            Route::get('/edit/{id}', 'EditController@editCafe')->name('edit')->whereNumber('id');
            Route::patch('/update/{id}', 'UpdateController@updateCafe')->name('update')->whereNumber('id');
        });

    /* Роуты для отдыха. */
    Route::prefix('/chill')
        ->name('chill.')
        ->namespace('App\Http\Controllers\Modules\Chill')
        ->group(function () {
            Route::get('/', [AdminCafeController::class, 'index'])->name('index');
        });

    /* Роуты для бронирования. */
    Route::prefix('/reservation')
        ->name('reservation.')
        ->namespace('App\Http\Controllers\Modules\Reservation')
        ->group(function () {
            Route::get('/', [AdminCafeController::class, 'index'])->name('index');
        });

    /* Роуты для новостей. */
    Route::prefix('/news')
        ->name('news.')
        ->namespace('App\Http\Controllers\Modules\News')
        ->group(function () {
            Route::get('/', [AdminCafeController::class, 'index'])->name('index');
        });

    /* Роуты для Галереи. */
    Route::prefix('/gallery')
        ->name('gallery.')
        ->namespace('App\Http\Controllers\Modules\Gallery')
        ->group(function () {
            Route::get('/', [AdminCafeController::class, 'index'])->name('index');
        });

    /* Роуты для вопросов-ответов. */
    Route::prefix('/qa')
        ->name('qa.')
        ->namespace('App\Http\Controllers\Modules\Qa')
        ->group(function () {
            Route::get('/', [AdminCafeController::class, 'index'])->name('index');
        });

    /* Роуты для about. */
    Route::prefix('/about')
        ->name('about.')
        ->namespace('App\Http\Controllers\Modules\About')
        ->group(function () {
            Route::get('/', [AdminCafeController::class, 'index'])->name('index');
        });

    /* Роуты для отзывов. */
    Route::prefix('/comments')
        ->name('comments.')
        ->namespace('App\Http\Controllers\Modules\Comment')
        ->group(function () {
            Route::get('/', [AdminCafeController::class, 'index'])->name('index');
        });

    /* Роуты для сообщений. */
    Route::prefix('/messages')
        ->name('messages.')
        ->namespace('App\Http\Controllers\Modules\Message')
        ->group(function () {
            Route::get('/', [AdminCafeController::class, 'index'])->name('index');
        });
});



//Route::get('/setup-adfm', [\Wtolk\Adfm\Controllers\SetupController::class, 'setUpProviders'])->name('adfm.start');


