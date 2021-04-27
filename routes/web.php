<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => [\App\Http\Controllers\PostController::class, 'getIndex'],
    'as' => 'blog.index'
]);

Route::get('post/{id}', [
    'uses' => [\App\Http\Controllers\PostController::class, 'getPost',
        'as' => 'blog.post']
]);

Route::get('/about', function () {
    return view('other.about');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('', [
        'uses' => [\App\Http\Controllers\PostController::class, 'getAdminIndex'],
        'as' => 'admin.index'
    ]);
    Route::get('create', [
        'uses' => [\App\Http\Controllers\PostController::class, 'getAdminCreate'],
        'as' => 'admin.create'
    ]);

    Route::post('create', [
        'uses' => [\App\Http\Controllers\PostController::class, 'postAdminCreate'],
        'as' => 'admin.create'
    ]);

    Route::get('edit/{id}', [
        'uses' => [\App\Http\Controllers\PostController::class, 'getAdminEdit'],
        'as' => 'admin.edit'
    ]);

    Route::post('edit', [
        'uses' => [\App\Http\Controllers\PostController::class, 'postAdminUpdate'],
        'as' => 'admin.update'
    ]);

});


