<?php

namespace App\Http\Controllers;

use App\Models\Proc;
use App\Models\Terms;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index(){
        $terms = Terms::with('proc')->paginate(10);
        return view('term.index', compact('terms'));
    }

    public function create(){
        $procs = Proc::all();
        return view('term.create',compact('procs'));
    }

    public function store(Request $request){
        // dd($request->all());
        $validated=$request->validate([
            'term' => 'required',
            'description' => 'required',
        ], [
            'term.required' => 'Por favor, ingrese un termino.',
            'description.required' => 'Por favor, ingrese una descripción.',
        ]);

        $term = new Terms();
        $term->term = $request->term;
        $term->description = $request->description;
        $term->id_proc = $request->id_proc;
        $term->created_at = now();
        // $term->updated_at = now(); 
        $term->save();
        return redirect()->route('terminos.index');
    }   

    public function edit($id){
        $term = Terms::find($id);
        $procs = Proc::all();
        return view('term.edit', compact('term', 'procs'));
    }

    public function update(Request $request,$id){
        $validated=$request->validate([
            'term' => 'required',
            'description' => 'required',
        ], [
            'term.required' => 'Por favor, ingrese un termino.',
            'description.required' => 'Por favor, ingrese una descripción.',
        ]);
        $term = Terms::find($id);
        $term->term = $request->term;
        $term->description = $request->description;
        $term->id_proc = $request->id_proc;
        $term->save();
        return redirect()->route('terminos.index');
    }

    public function destroy($id){
        $term = Terms::find($id);
        $term->delete();
        return redirect()->route('terminos.index');
    }
}
