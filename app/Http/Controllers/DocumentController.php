<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clas;
use App\Models\Course;
use App\Models\Document;
use App\Models\Personal;
use App\Models\Proc;
use App\Models\Speciality;
use App\Models\Syst;
use App\Models\Type_doc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(){
        $documents = Document::with('syst:id,code', 'proc:id,code', 'personal:id,name,last_name,code','typeDoc:id,name')->paginate(10);
        // dd($documents);
        return view('document.index', compact('documents'));
    }

    public function create(){
        $personals = Personal::all('id', 'name', 'last_name', 'code');
        $categories = Category::all('id', 'name');
        $systs = Syst::with('procs')->get(['id', 'code']);
        $classes = Clas::all('id', 'code');
        $specs = Speciality::all('id', 'code');
        $typeDocs = Type_doc::all('id', 'name');


        return view('document.create', compact('personals', 'categories', 'systs', 'classes', 'specs', 'typeDocs'));
    }

    public function store( Request $request){
        // dd($request);

        $validated = $request->validate([
            'name' => ['required', 'max:125', 'min:3'],
            'description' => ['required'],
            'id_system' => ['required'],
            'url_document' => ['required'],
            'id_clas' => ['required'],
            'id_proc' => ['required'],
            'id_spec' => ['required'],
            'id_personal' => ['required'],
            'id_category' => ['required'],
            'id_type_doc' => ['required'],
        ],[
            'name.max' => 'El nombre no debe tener más de 125 caracteres.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'description.required' => 'Por favor, ingrese una descripción.',
            'id_proc.required' => 'Por favor, seleccione un proceso, en caso de no aparecer, consulte con el administrador.',
            'url_document.required' => 'Por favor, seleccione un archivo.',
        ]);
        // dd($request);
        $filename = $request->file('url_document')->store('docs');
        // dd($filename);
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
        $document->url_document = $filename;
        $document->save();
        return redirect()->route('documentos.index');
        // return "dodo";
    }

    public function show($id){
        $document = Document::with('syst:id,code', 'proc:id,code', 'personal:id,name,last_name,code','typeDoc:id,name', 'clas:id,code', 'spec:id,code', 'category:id,name')->find($id);
        return view('document.show', compact('document'));
    }

    public function edit($id){
        $document = Document::find($id);
        $personals = Personal::all('id', 'name', 'last_name', 'code');
        $categories = Category::all('id', 'name');
        $systs = Syst::with('procs')->get(['id', 'code']);
        $classes = Clas::all('id', 'code');
        $specs = Speciality::all('id', 'code');
        $typeDocs = Type_doc::all('id', 'name');
        return view('document.edit', compact('document', 'personals', 'categories', 'systs', 'classes', 'specs', 'typeDocs'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => ['required', 'max:125', 'min:3'],
            'description' => ['required'],
            'id_system' => ['required'],
            'url_document' => ['required'],
            'id_clas' => ['required'],
            'id_proc' => ['required'],
            'id_spec' => ['required'],
            'id_personal' => ['required'],
            'id_category' => ['required'],
            'id_type_doc' => ['required'],
        ],[
            'name.max' => 'El nombre no debe tener más de 125 caracteres.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'description.required' => 'Por favor, ingrese una descripción.',
            'id_proc.required' => 'Por favor, seleccione un proceso, en caso de no aparecer, consulte con el administrador.',
            'url_document.required' => 'Por favor, seleccione un archivo.',
        ]);

        $document = Document::find($id);
        Storage::delete($document->url_document);
        $filename = $request->file('url_document')->store('docs');
        $document->code = request('name');
        $document->description = request('description');
        $document->url_document = $filename;
        $document->id_system = request('id_system');
        $document->id_clas = request('id_clas');
        $document->id_proc = request('id_proc');
        $document->id_spec = request('id_spec');
        $document->id_personal = request('id_personal');
        $document->id_category = request('id_category');
        $document->id_type_doc = request('id_type_doc');
        $document->save();
        return redirect()->route('documentos.index');
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        Storage::delete($document->url_document);
        $document->delete();

        return redirect()->route('documentos.index');
    }

    public function download($id){
        $document = Document::find($id);
        return Storage::download($document->url_document);
    }

    public function docsCourse($id){
        $course = Course::with('docs')->find($id);
        $documents = $course->docs;
        // dd($documents);
        return view('course.doc.index', compact('course', 'documents'));

    }

    public function docCourseCreate($id){
        $course = Course::find($id);
        $documents = Document::all('id','code')->whereNotIn('id', $course->docs->pluck('id'));
        // dd($documents);

        return view('course.doc.create', compact('course', 'documents'));
    }

    public function docCourseStore($id){
        $course = Course::with('docs')->find($id);
        $course->docs()->attach(request('id_document'), ['active' => request('active')]);
        return redirect()->route('documentos.course', $id);
    }

    public function docCourseEdit($id, $id2){
        $course = Course::with('docs')->find($id);
        $documents = $course->docs;
        $document = $documents->where('id', '=', $id2)->first();
        // dd($document);
        return view('course.doc.edit', compact('course', 'document'));
    }

    public function docCourseUpdate($id, $id2){
        $course = Course::with('docs')->find($id);
        $documents = $course->docs;
        $document = $documents->where('id', '=', $id2)->first();
        $document->pivot->active = request('active');
        $document->pivot->save();
        return redirect()->route('documentos.course', $id); 
    }

    public function docCourseDestroy($id, $id2){
        $course = Course::with('docs')->find($id);
        $course->docs()->detach($id2);
        return redirect()->route('documentos.course', $id);
    }

}
