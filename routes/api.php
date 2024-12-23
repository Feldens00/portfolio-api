<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTAuthController;
use App\Http\Middleware\JwtMiddleware;
use App\Http\Controllers\Post;
use App\Http\Controllers\Account;


Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);

Route::middleware([JwtMiddleware::class])->group(function () {
    // Login
    Route::get('users', [JWTAuthController::class, 'getUser']);
    Route::post('logout', [JWTAuthController::class, 'logout']);

    // Posts
    Route::get('posts', Post\IndexController::class);
    Route::post('posts/{id}', Post\ShowController::class);
    Route::post('posts', Post\StoreController::class)->middleware('acl:create_post');;
    Route::put('posts/{id}', Post\UpdateController::class)->middleware('acl:edit_post');
    Route::get('posts/search', Post\SearchController::class);
    Route::delete('posts/{id}', Post\DeleteController::class)->middleware('acl:delete_post');;

    // Accounts
    Route::get('accounts', Account\IndexController::class);
    Route::get('accounts/{id}', Account\ShowController::class);
    Route::post('accounts', Account\StoreController::class)->middleware('acl:delete_account');
    Route::put('accounts/{id}', Account\UpdateController::class)->middleware('acl:delete_account');
    Route::delete('accounts/{id}', Account\DeleteController::class)->middleware('acl:delete_account');
});