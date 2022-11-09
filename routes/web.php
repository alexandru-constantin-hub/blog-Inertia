<?php

use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/', [PostController::class, 'homepage'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/post/{post}', [PostController::class, 'show']);
Route::get('/category/{category}', [PostController::class, 'indexCategory']);
Route::get('/authors/{author}', [PostController::class, 'indexAuthor']);
//Route::get('/post/{post}', function () {
//    return Inertia::render('Posts/Show');
//});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});



// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/dashboard/postsList', [PostController::class, 'indexPostsList'])->name('postsList');
    Route::get('/dashboard/postCreate', [PostController::class, 'create'])->name('postCreate');
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/dashboard/postEdit/{post}', [PostController::class, 'edit']);
    Route::put('/dashboard/postUpdate/{post}', [PostController::class, 'update']);
    Route::delete('dashboard/post/deletePost/{post}', [PostController::class, 'destroy']);
});


