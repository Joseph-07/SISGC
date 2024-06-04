<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clas;
use App\Models\Document;
use App\Models\Personal;
use App\Models\Proc;
use App\Models\Speciality;
use App\Models\Syst;
use App\Models\Type_doc;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        $documents = Document::paginate(10);
        return view('document.index', compact('documents'));
    }

    public function create(){
        $personals = Personal::all('id', 'name', 'last_name', 'code');
        $categories = Category::all('id', 'name');
        $systs = Syst::with('procs')->get(['id', 'code']);
        // dd($systs);
        $classes = Clas::all('id', 'code');
        $specs = Speciality::all('id', 'code');
        $typeDocs = Type_doc::all('id', 'name');


        return view('document.create', compact('personals', 'categories', 'systs', 'classes', 'specs', 'typeDocs'));
    }

    public function store( Request $request){
        // dd($request);
        $document = new Document();
        $document->code = request('name');
        $document->description = request('description');
        $document->id_system = request('id_system');
        $document->id_clas = request('id_clas');
        $document->id_proc = request('id_proc');
        $document->id_spec = request('id_spec');
        $document->id_personal = request('id_personal');
        $document->id_category = request('id_category');
        $document->id_type_doc = request('id_type_doc');
        $document->save();
        return redirect()->route('documentos.index');
        // return "dodo";
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


}
