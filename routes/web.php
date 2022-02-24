<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;

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

Route::get('/', function () {
    return view('welcome');
});

// The route we have created to show all blog posts.
Route::get('/blog', [BlogPostController::class, 'index']);

// Show 1 blog post.
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show');

// Show create post form
Route::get('/blog/create/post', [BlogPostController::class, 'create']);

// Save created post to the database
Route::post('/blog/create/post', [BlogPostController::class, 'store']);

// Show edit post form
Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit']);

// Commit edited post to the database
Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update']);

// Destroy the blog post
Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy']);


// AUTHENTICATION
Route::get('/admin', [AdminController::class, 'index']);

Route::get('/superadmin', [SuperAdminController::class, 'index']);
