<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\JokeController;

// Rutas protegidas por autenticación
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas de posts (excepto index y show, que son públicas)
    Route::resource('posts', PostController::class)->except(['index', 'show']);

    // Ruta para añadir comentarios (solo usuarios autenticados)
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    // Ruta para eliminar comentarios (solo administradores)
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy')
        ->middleware('admin'); // Middleware personalizado para administradores
});

// Rutas públicas para visualizar posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

