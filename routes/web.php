<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', HomeController::class);

// Rutas de los posts
Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::put('/posts/{id}', [PostController::class, 'update']);

Route::delete('/posts/{id}', [PostController::class, 'destroy']);

Route::get('/posts/{id}', [PostController::class, 'show']);


Route::get('prueba', function () {
    
    // Crear un nuevo registro de la tabla posts
    $post = New Post;

    // $post->title = 'Titulo de PruEbA 3';
    // $post->content = 'Contenido de prueba 3'; 
    // $post->category = 'Categoria de prueba 3';
    // $post->is_active = true;
    // $post->published_at = now();
    
    // $post->save();

    // Actualizar un post
    //Formas de obtener los registros el primero es para obtener por id, el segundo es por un where que indica el campo
    // $post = Post::find(1);
    // $post = Post::where('title', 'Titulo de prueba 1')->first();

    // $post->title = 'Titulo Actualizado';
    // $post->content = 'Contenido Actualizado';
    // $post->category = 'Categoria Actualizada';
    // $post->save();  

    // Obtener los registros de la tabla posts con la clausula where, seleccionado el id y el title
    // Y ordenandolos de forma descendente
    // $post = Post::where('id','>=','2')->select('id','title')->orderBy('id','desc')->get();

    // Eliminar un registro
    // $post = Post::find(1);
    // $post->delete();
    // return "Eliminado";
    // dd($post->is_active);
    return $post->is_active;
});

// Route::get('/posts/{post}/{cate?}', function ($post,$cate = null) {
//     if($cate){
//         return "Aqui se mostrara el post $post de la categoria $cate";
//     }
//     return "$post";
// });
