<?php

use App\Http\Controllers\Api\V1\IndexController;
use App\Http\Controllers\Api\V1\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/posts', [IndexController::class, 'allPost'])->name('home');

// Route::get('/posts{id}', [IndexController::class, 'postById{id}'])->name('home');



Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts{id}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);
