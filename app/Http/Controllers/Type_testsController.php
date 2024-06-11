<?php

namespace App\Http\Controllers;

use App\Models\Type_test;
use Illuminate\Http\Request;

class Type_testsController extends Controller
{
    public function index(){
        $typeTests= Type_test::paginate(10);
        return view('type.tests.index', compact('typeTests'));
    }

    public function create()
    {
        return view('type.tests.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'Por favor ingrese el nombre.',
        ]);
        $typeTest = new Type_test();
        $typeTest->name = request('name');
        $typeTest->save();
        return redirect()->route('tiposTest.index');
    }

    public function edit($id){
        $typeTest = Type_test::find($id);
        return view('type.tests.edit', compact('typeTest'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'Por favor ingrese el nombre.',
        ]);
        $typeTest = Type_test::find($id);
        $typeTest->name = $request->name;
        $typeTest->save();
        return redirect()->route('tiposTest.index');
    }

    public function destroy($id)
    {
        $typeTest = Type_test::find($id);
        $typeTest->delete();
        return redirect()->route('tiposTest.index');
    }
    
}
