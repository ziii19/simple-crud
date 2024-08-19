<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

Route::get('/input', function () {
    return view('input');
});

Route::get('/edit/{id}', function ($id) {
    $post = Post::findOrFail($id);
    return view('edit', ['post' => $post]);
});

Route::post('/input',[PostController::class, 'store']);
Route::put('/edit/{id}',[PostController::class, 'update']);
Route::delete('/input/{id}', [PostController::class, 'destroy']);