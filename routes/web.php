<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// VER POST EN INDEX Y EN BUSCAR
Route::get('posts/{post}',[PostController::class,'show'])->name('post.show');


// AGREGAR UN POST A FAVORITOS
Route::post('posts/{post}', [PostController::class, 'markAsFavorite'])->name('resources.markAsFavorite');


// VER FAVORITOS DE CADA USUARIO
Route::get('/users/{user}/favorite-posts', [FavoritePostController::class, 'showFavoritePosts'])->name('favoritePosts.index');


// BUSCAR POST
Route::get('/buscar', [PostController::class, 'buscar_post']);




