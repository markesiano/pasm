<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Resources\Post;
use App\Http\Controllers\ThoughtController;

Route::get('/', [PostController::class, 'index'])->name('post.index');

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

Route::get('posts/{post}',[PostController::class,'show'])->name('post.show');
