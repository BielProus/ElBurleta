<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



// -----------------------------
// Rutas protegidas para administradores
// -----------------------------

// Rutas protegidas para administradores
Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// -----------------------------
// Rutas públicas
// -----------------------------
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


// -----------------------------
// Rutas protegidas por autenticación
// -----------------------------
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para posts (autenticados, no admin)
    Route::resource('posts', PostController::class)->except(['index', 'show']);

    // Crear comentarios
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});