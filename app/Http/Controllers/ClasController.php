<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use Illuminate\Http\Request;

class ClasController extends Controller
{
    public function index()
    {
        $classes = Clas::paginate(10);
        return view('clas.index', compact('classes'));
    }

    public function create()
    {
        return view('clas.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $clas = new Clas();
        $clas->code = $request->name;
        $clas->description = $request->description;
        $clas->save();
        return redirect()->route('clases.index');
    }

    public function edit($id)
    {
        $clas = Clas::find($id);
        return view('clas.edit', compact('clas'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $clas = Clas::find($id);
        $clas->code = $request->name;
        $clas->description = $request->description;
        $clas->save();
        return redirect()->route('clases.index');
    }

    public function destroy($id)
    {
        // dd($id);
        $clas = Clas::find($id);
        $clas->delete();
        return redirect()->route('clases.index');
    }
}
