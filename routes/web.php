<?php

use Illuminate\Support\Facades\Auth;
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


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/about', AboutController::class)->name('about.index');
    Route::get('/contacts', ContactsController::class)->name('contact.index');


    Route::get('/', IndexController::class)->name('home');

});
Route::group(['namespace' => 'App\Http\Controllers\Profile', 'middleware' => 'auth', 'prefix' => 'profile' ], function () {
    Route::get('/', IndexController::class)->name('profile.index');
    Route::get('/{profile}', ShowController::class)->name('profile.show');
});


Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {

    Route::get('/{post}', ShowController::class)->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments', 'middleware' => 'comment.allow'], function () {
        Route::post('/', StoreController::class)->name('post.comment.store');
    });

    Route::group(['namespace' => 'CommentReply', 'prefix' => '{comment}/replies', 'middleware' => 'comment.allow'], function () {
        Route::post('/', StoreController::class)->name('post.reply.comment.store');
    });

    Route::group(['namespace' => 'CommentLike', 'prefix' => '{comment}/commentLikes', 'middleware' => 'like.allow'], function () {
        Route::post('/', StoreController::class)->name('post.like.comment.store');
    });

    Route::group(['namespace' => 'CommentReplyLike', 'prefix' => '{reply}/replyLikes', 'middleware' => 'like.allow'], function () {
        Route::post('/', StoreController::class)->name('post.like.comment.reply.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes', 'middleware' => 'like.allow'], function () {
        Route::post('/', StoreController::class)->name('post.like.store');
    });
});


Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal'], function () {
    Route::get('/', IndexController::class)->name('personal.index');

    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', IndexController::class)->name('personal.liked.index');
        Route::delete('/{post}', DeleteController::class)->name('personal.liked.delete');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function () {
        Route::get('/', IndexController::class)->name('personal.comment.index');
        Route::get('/{comment}/edit', EditController::class)->name('personal.comment.edit');
        Route::patch('/{comment}', UpdateController::class)->name('personal.comment.update');
        Route::delete('/{comment}', DeleteController::class)->name('personal.comment.delete');
    });


});


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::get('/', IndexController::class)->name('admin.index');

    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', IndexController::class)->name('admin.post.index');
        Route::patch('/post/{post}', UpdateController::class)->name('admin.post.update');
        Route::delete('/post/{post}', DeleteController::class)->name('admin.post.delete');
        Route::get('/post', IndexController::class)->name('admin.post.index');
        Route::post('/post', StoreController::class)->name('admin.post.store');
        Route::get('/post/create', CreateController::class)->name('admin.post.create');
        Route::get('/post/{post}', ShowController::class)->name('admin.post.show');
        Route::get('/post/{post}/edit', EditController::class)->name('admin.post.edit');
    });

    Route::group(['namespace' => 'Category'], function () {
        Route::patch('/category/{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/category/{category}', DeleteController::class)->name('admin.category.delete');
        Route::get('/category', IndexController::class)->name('admin.category.index');
        Route::get('/category/create', CreateController::class)->name('admin.category.create');
        Route::get('/category/{category}/edit', EditController::class)->name('admin.category.edit');
        Route::get('/category/{category}', ShowController::class)->name('admin.category.show');
        Route::post('/category', StoreController::class)->name('admin.category.store');
    });

    Route::group(['namespace' => 'Tag'], function () {
        Route::patch('/tag/{tag}', UpdateController::class)->name('admin.tag.update');
        Route::delete('/tag/{tag}', DeleteController::class)->name('admin.tag.delete');
        Route::get('/tag', IndexController::class)->name('admin.tag.index');
        Route::get('/tag/create', CreateController::class)->name('admin.tag.create');
        Route::get('/tag/{tag}/edit', EditController::class)->name('admin.tag.edit');
        Route::get('/tag/{tag}', ShowController::class)->name('admin.tag.show');
        Route::post('/tag', StoreController::class)->name('admin.tag.store');
    });

    Route::group(['namespace' => 'User'], function () {
        Route::patch('/user/{user}', UpdateController::class)->name('admin.user.update');
        Route::delete('/user/{user}', DeleteController::class)->name('admin.user.delete');
        Route::get('/user', IndexController::class)->name('admin.user.index');
        Route::get('/user/create', CreateController::class)->name('admin.user.create');
        Route::get('/user/{user}/edit', EditController::class)->name('admin.user.edit');
        Route::get('/user/{user}', ShowController::class)->name('admin.user.show');
        Route::post('/user', StoreController::class)->name('admin.user.store');
    });

});

Auth::routes(['verify' => true]);

