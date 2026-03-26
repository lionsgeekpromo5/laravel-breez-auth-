<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $posts = Post::all();
    return view('dashboard', compact('posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin-dashboard', function () {
    return view('adminDashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.delete');
});

require __DIR__.'/auth.php';
