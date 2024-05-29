<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SystController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('inicio');

Route::get('/course', [CourseController::class, 'index'])->name('course.index');

Route::get('/users', [PersonalController::class, 'index'])->name('personal.index');

Route::get('/systems', [SystController::class, 'index'])->name('sistemas.index');
Route::get('/systems/create', [SystController::class, 'create'])->name('sistemas.create');
Route::get('/systems/{id}', [SystController::class, 'show'])->name('sistemas.show');
Route::post('/systems', [SystController::class, 'store'])->name('sistemas.store');
Route::get('/systems/{id}/edit', [SystController::class, 'edit'])->name('sistemas.edit');
Route::put('/systems/{id}', [SystController::class, 'update'])->name('sistemas.update');
Route::delete('/systems/{id}', [SystController::class, 'destroy'])->name('sistemas.destroy');


// Route::middleware('auth')->group(function () {
//     // Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//     // Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//     // Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

//     // Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
//     // Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

//     // Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

//     // Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
//     Route::resource('posts', PostController::class);
    
//     Route::get('/course', [CourseController::class, 'index'])->name('course.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
