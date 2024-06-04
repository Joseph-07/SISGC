<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClasController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PerCourController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProcController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\SystController;
use App\Http\Controllers\Type_docsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // dd($_SESSION['route-act']);
    return view('syst.create');
})->name('inicio');


Route::get('/users', [PersonalController::class, 'index'])->name('personal.index');
Route::get('/users/create', [PersonalController::class, 'create'])->name('personal.create');
Route::get('users/{id}', [PersonalController::class, 'show'])->name('personal.show');
Route::post('/users', [PersonalController::class, 'store'])->name('personal.store');
Route::get('/users/{id}/edit', [PersonalController::class, 'edit'])->name('personal.edit');
Route::put('/users/{id}', [PersonalController::class, 'update'])->name('personal.update');
Route::delete('/users/{id}', [PersonalController::class, 'destroy'])->name('personal.destroy');


Route::get('/systems', [SystController::class, 'index'])->name('sistemas.index');
Route::get('/systems/create', [SystController::class, 'create'])->name('sistemas.create');
Route::get('/systems/{id}', [SystController::class, 'show'])->name('sistemas.show');
Route::post('/systems', [SystController::class, 'store'])->name('sistemas.store');
Route::get('/systems/{id}/edit', [SystController::class, 'edit'])->name('sistemas.edit');
Route::put('/systems/{id}', [SystController::class, 'update'])->name('sistemas.update');
Route::delete('/systems/{id}', [SystController::class, 'destroy'])->name('sistemas.destroy');

Route::resource('procs', ProcController::class)->names('procesos')->parameters(['procs' => 'id']);
Route::resource('specs', SpecialityController::class)->names('especialidades')->parameters(['specs' => 'id']);
Route::resource('clas', ClasController::class)->names('clases')->parameters(['clas' => 'id']);
Route::resource('courses', CourseController::class)->names('cursos')->parameters(['courses' => 'id']);
Route::resource('documents', DocumentController::class)->names('documentos')->parameters(['documents' => 'id']);
Route::resource('type_docs', Type_docsController::class)->names('tiposDoc')->parameters(['type_docs' => 'id']);
Route::resource('categories', CategoryController::class)->names('categorias')->parameters(['categories' => 'id']);

Route::get('/course_personals/{id}', [CourseController::class, 'personals'])->name('cursos.personals');
Route::get('/course_personals/{id}/create', [CourseController::class, 'personalCreate'])->name('cursos.personalsCreate');
Route::post('/course_personals/{id}', [CourseController::class, 'personalStore'])->name('cursos.personalsStore');
Route::get('/course_personals/{id}/edit/{id2}', [CourseController::class, 'personalEdit'])->name('cursos.personalsEdit');
Route::put('/course_personals/{id}/{id2}', [CourseController::class, 'personalUpdate'])->name('cursos.personalsUpdate');
Route::delete('/course_personals/{id}/{id2}', [CourseController::class, 'personalDestroy'])->name('cursos.personalsDestroy');



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
