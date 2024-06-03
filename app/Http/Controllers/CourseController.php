<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Course;
use App\Models\Personal;
use App\Models\Proc;
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

    public function store()
    {
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
        // $pivot->approved = false;
        // $pivot->save();
        // dd($personals);
        return view('course.personal.index', compact('course', 'personals'));
    }

    public function personalCreate($id){
        $course = Course::find($id);
        $personals = Personal::all('id', 'name', 'last_name', 'code');
        return view('course.personal.create', compact('course', 'personals'));
    }

}
