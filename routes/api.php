<?php

use App\Enums\PermissionType;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\JwtMiddleware;
use App\Models\Post;

Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);

Route::middleware([JwtMiddleware::class])->group(function () {
    // Login
    Route::get('users', [JWTAuthController::class, 'getUser']);
    Route::post('logout', [JWTAuthController::class, 'logout']);

    // Posts
    Route::get('posts', [PostController::class, 'index']);
    Route::get('/posts/{id}/edit', 'PostController@edit');
    Route::post('posts/{id}', [PostController::class, 'show']);
    Route::post('posts', [PostController::class, 'store']);
    Route::put('posts/{id}', [PostController::class, 'update'])->middleware('acl:edit,' . PermissionType::POST->value);
    Route::get('posts/search', [PostController::class, 'search']);
    Route::delete('posts/{id}', [PostController::class, 'delete']);

    // Accounts
    Route::get('accounts', [AccountController::class, 'index']);
    Route::get('accounts/{id}', [AccountController::class, 'show']);
    Route::post('accounts', [AccountController::class, 'store']);
    Route::put('accounts/{id}', [AccountController::class, 'update']);
    Route::delete('accounts/{id}', [AccountController::class, 'delete']);
});