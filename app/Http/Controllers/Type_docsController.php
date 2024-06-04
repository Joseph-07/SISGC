<?php

namespace App\Http\Controllers;

use App\Models\Type_doc;
use Illuminate\Http\Request;

class Type_docsController extends Controller
{
    public function index(){
        $typeDocs= Type_doc::paginate(10);
        return view('type.docs.index', compact('typeDocs'));
    }

    public function create()
    {
        return view('type.docs.create');
    }

    public function store(Request $request)
    {
        $typeDoc = new Type_doc();
        $typeDoc->name = request('name');
        $typeDoc->save();
        return redirect()->route('tiposDoc.index');
    }

    public function edit($id)
    {
        $typeDoc = Type_doc::find($id);
        return view('type.docs.edit', compact('typeDoc'));
    }

    public function update(Request $request, $id)
    {
        $typeDoc = Type_doc::find($id);
        $typeDoc->name = $request->name;
        $typeDoc->save();
        return redirect()->route('tiposDoc.index');
    }

    public function destroy($id)
    {
        $typeDoc = Type_doc::find($id);
        $typeDoc->delete();
        return redirect()->route('tiposDoc.index');
    }
    
}
