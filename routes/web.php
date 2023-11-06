<?php

use App\Http\Resources\Post;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ThoughtController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\CalificacionController;



// Route::get('/pensamientos',[ThoughtController::class, 'index'])->name('thought.index');
Route::get('/pensamientos', function (){
    return view('estudiante.index');
})->name('thought.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});





Route::post('pensamientos',[ThoughtController::class, 'store'])->name('thought.store');



// VER FAVORITOS DE CADA USUARIO
Route::get('/users/{user}/favorite-posts', [FavoritePostController::class, 'showFavoritePosts'])->name('favoritePosts.index');
// AGREGAR UN POST A FAVORITOS
Route::post('posts/{post}', [PostController::class, 'markAsFavorite'])->name('resources.markAsFavorite')->withoutMiddleware([ 'VerifyCsrfToken' ]);
Route::post('/posts/{post}/unfavorite', [PostController::class, 'removeFromFavorites'])->name('posts.unfavorite')->withoutMiddleware([ 'VerifyCsrfToken' ]);

// VER FAVORITOS DE USSUARIOS

Route::get('favoritos', [FavoritoController::class, 'index'])->name('favorites.index')->withoutMiddleware([ 'VerifyCsrfToken' ]);



//! RUTAS DE POST
//VISTA POSTS PSICOLOGO
Route::get('posts', [PostController::class, 'indexPsicologo'])->name('post.indexPsicologo');
//VISTA POST GENERAL
Route::get('/', [PostController::class, 'index'])->name('post.index');
// CREAR POSTS
Route::get('posts/create',[PostController::class,'create'])->name('post.create');
//Guardar POST
Route::post('posts',[PostController::class,'store'])->name('post.store');
// VER POST EN INDEX Y EN BUSCAR
Route::get('posts/{post}',[PostController::class,'show'])->name('post.show');
// BUSCAR POST
Route::get('/buscar', [PostController::class, 'buscar_post']);
// AGREGAR COMENTARIOS A POSTS
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comment.store');
// AGREGAR CALIFICACIONES A POST
Route::post('/posts/{postId}/calificar', [PostController::class, 'calificar'])->withoutMiddleware([ 'VerifyCsrfToken' ]);
// EDITAR POST VISTA
Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('post.edit');
// ACTUALIZAR POST
Route::put('posts/{post}',[PostController::class,'update'])->name('post.update');
// ELIMINAR POST
Route::delete('posts/{post}',[PostController::class,'destroy'])->name('post.destroy');






