<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','desc')->paginate(10);
        
        return view('posts.index', ['posts' => $posts]);
    }

    public function paginate($pagina=null){
        $posts = Post::orderBy('id','desc')->paginate(10);
        dd($pagina);
        //return view('posts.index', ['posts' => $posts, 'pagina' => $pagina]);
    }

    public function show($id){
        
        $post = Post::find($id);

        return view('posts.show', ['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;
        $post->is_active = true;
        $post->published_at = now();
        $post->save();  
        return redirect('/posts');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;
        $post->updated_at = now();
        $post->save();  
        return redirect("/posts/{$id}");
    }
   
    public function destroy($id){
        // return "Eliminando el post {$id}";
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }
    
    
}
