<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/test', [PostController::class, 'test']);

//Finish The page UI
//1- route to show the page that lists the posts
//2- view to render the html
//3- Controller to render the view








Route::resource('comments', CommentController::class,['parameters'=>['comments' =>'id']]);
Route::resource('posts', PostController::class,['parameters'=>['posts' =>'id']]);
// Route::get('/posts', [PostController::class, 'index']) -> name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create']) -> name('posts.create');
// Route::post('/posts', [PostController::class, 'store']) -> name('posts.store');
// Route::delete('/posts/{id}', [PostController::class, 'destroy'])-> name('posts.destroy');
// Route::get('/posts/{id}/edit', [PostsContoller::class,'edit'])->name('posts.edit');
// Route::put('/posts/{id}', [PostsContoller::class,'update'])->name('posts.update');
// Route::get('/posts/{id}', [PostsContoller::class,'show'])->name('posts.show');
