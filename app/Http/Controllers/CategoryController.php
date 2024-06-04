<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(){
        $category = new Category();
        $category->name = request('name');
        $category->save();
        return redirect()->route('categorias.index');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categorias.index');
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categorias.index');
    }
}
