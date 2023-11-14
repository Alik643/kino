<?php

use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Films', 'prefix'=>'films'], function () {
    Route::get('/', 'IndexController')->name('films.index');
    Route::get('/{film}', 'ShowController')->name('films.show');

    Route::group(['namespace' => 'Like', 'prefix'=>'{film}/likes'], function () {
        Route::post('/', 'StoreController')->name('film.like.store');
    });

    Route::group(['namespace' => 'Rate', 'prefix'=>'{film}'], function () {
        Route::post('/', 'StoreController')->name('film.rate.store');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Search', 'prefix'=>'search'], function () {
    Route::get('/', 'IndexController')->name('search.index');
//    Route::get('/search', 'ShowController')->name('search.show');
});

Route::group(['namespace' => 'App\Http\Controllers\Rejisor', 'prefix'=>'rejisor'], function () {
    Route::get('/{rejisor}', 'SingleController')->name('rejisor.single');
});

Route::group(['namespace' => 'App\Http\Controllers\Actor', 'prefix'=>'actor'], function () {
    Route::get('/{actor}', 'SingleController')->name('actor.single');
});

Route::group(['namespace' => 'App\Http\Controllers\Genre', 'prefix'=>'genre'], function () {
    Route::get('/{genre}', 'SingleController')->name('genre.single');
});


Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace' => 'Liked', 'prefix'=>'liked'], function () {
        Route::get('/', 'IndexController')->name('personal.liked.index');
        Route::delete('/{film}', 'DeleteController')->name('personal.liked.delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware'=>'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });
    Route::group(['namespace' => 'Actor', 'prefix' => 'actors'], function () {
        Route::get('/', 'IndexController')->name('admin.actor.index');
        Route::get('/create', 'CreateController')->name('admin.actor.create');
        Route::post('/', 'StoreController')->name('admin.actor.store');
        Route::get('/{actor}', 'ShowController')->name('admin.actor.show');
        Route::get('/{actor}/edit', 'EditController')->name('admin.actor.edit');
        Route::patch('/{actor}', 'UpdateController')->name('admin.actor.update');
        Route::delete('/{actor}', 'DeleteController')->name('admin.actor.delete');
    });
    Route::group(['namespace' => 'Genre', 'prefix' => 'genres'], function () {
        Route::get('/', 'IndexController')->name('admin.genre.index');
        Route::get('/create', 'CreateController')->name('admin.genre.create');
        Route::post('/', 'StoreController')->name('admin.genre.store');
        Route::get('/{genre}', 'ShowController')->name('admin.genre.show');
        Route::get('/{genre}/edit', 'EditController')->name('admin.genre.edit');
        Route::patch('/{genre}', 'UpdateController')->name('admin.genre.update');
        Route::delete('/{genre}', 'DeleteController')->name('admin.genre.delete');
    });
    Route::group(['namespace' => 'Rejisor', 'prefix' => 'rejisors'], function () {
        Route::get('/', 'IndexController')->name('admin.rejisor.index');
        Route::get('/create', 'CreateController')->name('admin.rejisor.create');
        Route::post('/', 'StoreController')->name('admin.rejisor.store');
        Route::get('/{rejisor}', 'ShowController')->name('admin.rejisor.show');
        Route::get('/{rejisor}/edit', 'EditController')->name('admin.rejisor.edit');
        Route::patch('/{rejisor}', 'UpdateController')->name('admin.rejisor.update');
        Route::delete('/{rejisor}', 'DeleteController')->name('admin.rejisor.delete');
    });
    Route::group(['namespace' => 'Film', 'prefix' => 'films'], function () {
        Route::get('/', 'IndexController')->name('admin.film.index');
        Route::get('/create', 'CreateController')->name('admin.film.create');
        Route::post('/', 'StoreController')->name('admin.film.store');
        Route::get('/{film}', 'ShowController')->name('admin.film.show');
        Route::get('/{film}/edit', 'EditController')->name('admin.film.edit');
        Route::patch('/{film}', 'UpdateController')->name('admin.film.update');
        Route::delete('/{film}', 'DeleteController')->name('admin.film.delete');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
