<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
//Route::get('{page}', App\Http\Controllers\Admin\Post\IndexController::class)->where('page', '.*');


Route::group(['namespace' => '', 'middleware' => 'jwt.auth'], function () {
//    Route::patch('/posts/{post}', UpdateController::class);
//    Route::delete('/posts/{post}', DeleteController::class);
//    Route::get('/posts/create', CreateController::class);
//    Route::get('/posts/{post}', ShowController::class);
//    Route::get('/posts/{post}/edit', EditController::class);
//    Route::post('/posts', StoreController::class);
});
