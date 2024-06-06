<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Course;
use App\Models\Personal;
use App\Models\PerXCor;
use App\Models\Proc;
use App\Models\Review;
use App\Models\Speciality;
use App\Models\Syst;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::with('personal')->orderBy('id','desc')->paginate(10);
        // dd($courses);
        return view('course.index', ['courses' => $courses]);
    }
    
    public function create(){
        $procs = Proc::all('id', 'code');
        $classes = Clas::all('id', 'code');
        $specs = Speciality::all('id', 'code');
        $systs = Syst::all('id', 'code');
        $personals = Personal::all('id', 'name', 'last_name', 'code');
        return view('course.create' , compact('procs', 'classes', 'specs', 'systs', 'personals'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'id_system' => 'required',
            'id_clas' => 'required',
            'id_proc' => 'required',
            'id_spec' => 'required',
            'id_personal' => 'required',
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'description.required' => 'El campo descripción es obligatorio',
            'id_system.required' => 'El campo sistema es obligatorio',
            'id_clas.required' => 'El campo clase es obligatorio',
            'id_proc.required' => 'El campo proceso es obligatorio',
            'id_spec.required' => 'El campo especialidad es obligatorio',
            'id_personal.required' => 'El campo personal es obligatorio',   
        ]);

        $course = new Course();
        $course->code = request('name');
        $course->description = request('description');
        $course->id_system = request('id_system');
        $course->id_clas = request('id_clas');
        $course->id_proc = request('id_proc');
        $course->id_spec = request('id_spec');
        $course->id_personal = request('id_personal');
        $course->save();
        return redirect()->route('cursos.index');
    }

    public function show($id){
        $course = Course::with('personal', 'syst', 'clas', 'proc', 'spec')->find($id);
        return view('course.show', ['course' => $course]);
    }

    public function edit($id){
        $course = Course::find($id);
        $procs = Proc::all('id', 'code');
        $classes = Clas::all('id', 'code');
        $specs = Speciality::all('id', 'code');
        $systs = Syst::all('id', 'code');
        $personals = Personal::all('id', 'name', 'last_name', 'code');
        // dd($courses);
        return view('course.edit', compact('course', 'procs', 'classes', 'specs', 'systs', 'personals'));
    }

    public function update($id){
        
        $course = Course::find($id);
        $course->code = request('name');
        $course->description = request('description');
        $course->id_system = request('id_system');
        $course->id_clas = request('id_clas');
        $course->id_proc = request('id_proc');
        $course->id_spec = request('id_spec');
        $course->id_personal = request('id_personal');
        $course->save();
        return redirect()->route('cursos.index');
    }   

    public function destroy($id){
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('cursos.index');
    }

    public function personals($id){
        $course = Course::with('personals')->find($id);
        // var_dump($course->personals);
        $personals =$course->personals;
        // $perXcor = PerXCor::where('id_course', $id)->get();
        // dd($perXcor);
        // $pivot->approved = false;
        // $pivot->save();
        // dd($personals);
        return view('course.personal.index', compact('course', 'personals'));
    }

    public function personalCreate($id){
        $course = Course::find($id);
        $personals = Personal::all('id', 'name', 'last_name', 'code')->whereNotIn('id', $course->personals->pluck('id'));
        return view('course.personal.create', compact('course', 'personals'));
    }

    public function personalStore($id){
        $course = Course::with('personals')->find($id);
        $course->personals()->attach(request('id_personal'), ['approved' => request('approved'), 'test_permision' => request('test_permision'), 'grade' => request('grade')]);
        return redirect()->route('cursos.personals', $id);
    }

    public function personalEdit($id, $id2){
        $course = Course::with('personals')->find($id);
        $personals = $course->personals;
        $personal = $personals->where('id', '=', $id2)->first();
        // dd($personal);
        return view('course.personal.edit', compact('course', 'personal'));
    }

    public function personalUpdate($id, $id2){
        $course = Course::with('personals')->find($id);
        $personals = $course->personals;
        $personal = $personals->where('id', '=', $id2)->first();
        $personal->pivot->approved = request('approved');
        $personal->pivot->test_permision = request('test_permision');
        $personal->pivot->grade = request('grade');
        $personal->pivot->save();
        return redirect()->route('cursos.personals', $id);
    }

    public function personalDestroy($id, $id2){
        $course = Course::with('personals')->find($id);
        // dd($course->personals);
        $course->personals()->detach($id2);
        return redirect()->route('cursos.personals', $id);
    }

    
}
